<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Question;
use App\QuestionDetail;
use Carbon\Carbon;

use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;
use Illuminate\Support\Str;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});

class ClientExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{

    protected $param;

    function __construct($param)
    {
        $this->param = $param;
    }

    public function collection()
    {
        if (isset($this->param['StartDate']) && isset($this->param['EndDate'])) {
            $fromDate = Carbon::createFromFormat('d M Y', $this->param['StartDate'])->format('Y-m-d') . ' 00:00:00';
            $toDate = Carbon::createFromFormat('d M Y', $this->param['EndDate'])->format('Y-m-d') . ' 24:60:60';

            $data = Client::with('getSurvey')->where('status', '<>', null)->orderBy('updated_at', 'desc')
                ->where('updated_at', '>=', $fromDate)
                ->where('updated_at', '<=', $toDate)
                ->get();
        } else {
            $data = Client::with('getSurvey')->where('status', '<>', null)->orderBy('updated_at', 'desc')->get();
        }

        foreach ($data as $row) {
            if ($this->param['type'] == 'intern') {
                $order[] = array(
                    '0' => $row->name,
                    '1' => Str::formatIC($row->ic_number),
                    '2' => Str::formatPhone($row->phone),
                    '3' => $row->address,
                    '4' => $row->timeslot
                );
            } elseif ($this->param['type'] == 'review') {
                $surveyPre = array(
                    '0' => $row->name,
                    '1' => Str::formatIC($row->ic_number),
                    '2' => Str::formatPhone($row->phone),
                    '3' => $row->address,
                    '4' => $row->timeslot,
                );
                $answers = [];
                if ($row['getSurvey']) {
                    foreach ($row['getSurvey'] as $index) {
                        if (in_array($index->question_type, array('CHECKBOX', 'RADIO_BUTTON', 'RADIO_BUTTON_RANGE'))) {
                            $input = [];
                            $exp = explode(",", $index['answer']);
                            $answerCheckbox = array_combine($exp, $exp);
                            $questiondetail = Question::findOrFail($index['question_id'])->getQuestionDetail()->get();
                            foreach ($questiondetail as $col) {
                                if (in_array($col->id, $answerCheckbox)) {
                                    if ($col['other'] == '1' && $index->answer_other) {
                                        $input[] = $col->name . ': ' . nl2br(strip_tags(htmlspecialchars_decode($index->answer_other)));
                                    } else {
                                        $input[] = $col->name;
                                    }
                                }
                            }
                            $answers[] = implode(" \r\n", $input);
                        } elseif (in_array($index->question_type, array('SORT'))) {
                            $ids = explode(',', $index['answer']);
                            $sorts = QuestionDetail::whereIn('id', $ids)->orderByRaw('FIELD (id, ' . $index['answer'] . ') ASC')->select('name')->get();
                            if ($sorts) {
                                $listSort = [];
                                foreach ($sorts as $sort) {
                                    $listSort[] = $sort['name'];
                                }
                            }
                            $answers[] = implode(" \r\n", $listSort);
                        } else {
                            $answers[] = nl2br(strip_tags(htmlspecialchars_decode($index->answer)));
                        }
                    }
                }
                $order[] = array_merge($surveyPre, $answers);
            } else {
                $order[] = array(
                    '0' => $row->name,
                    '1' => Str::formatIC($row->ic_number),
                    '2' => Str::formatPhone($row->phone),
                    '3' => $row->address
                );
            }
        }
        return (collect($order));
    }

    public function headings(): array
    {
        if ($this->param['type'] == 'intern') {
            return ['Name', 'IC Number', 'Phone', 'Address', 'Timeslot'];
        } elseif ($this->param['type'] == 'review') {
            $data = Client::with('getSurvey')->where('status', '<>', null)->first();
            $collection = collect(['Name', 'IC Number', 'Phone', 'Address', 'Timeslot']);
            if ($data->getSurvey) {
                foreach ($data->getSurvey as $item) {
                    $collection->push('Q' . $item->id);
                }
            }
            return $collection->all();
        } else {
            return ['Name', 'IC Number', 'Phone', 'Address'];
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->styleCells(
                    'A1:AE1',
                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK
                            ],
                        ],
                        'font' => array(
                            'bold'      =>  true,
                        )
                    ]
                );
            },
        ];
    }
}

class ExportController extends Controller
{
    public function exportFile(Request $request)
    {
        $param = $request->all();
        $param['StartDate'] = $request->input('StartDate');
        $param['EndDate'] = $request->input('EndDate');
        return Excel::download(
            new ClientExport($param),
            $param['type'] . date(" Y-m-d") . '.csv', //csv,xlsx
            \Maatwebsite\Excel\Excel::CSV,
            [
                'Content-Type' => 'text/csv',
            ]
        );
    }
}
