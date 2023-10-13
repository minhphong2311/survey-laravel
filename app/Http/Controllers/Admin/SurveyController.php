<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Question;
use App\QuestionDetail;
use Carbon\Carbon;

class SurveyController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'survey');
    }

    public function index(Request $request)
    {
        $param = $request->all();
        $page = $request->session()->get('survey_show')?$request->session()->get('survey_show'):'10';

        if (isset($param['StartDate']) && isset($param['EndDate'])) {
            $fromDate = Carbon::createFromFormat('d M Y', $param['StartDate'])->format('Y-m-d') . ' 00:00:00';
            $toDate = Carbon::createFromFormat('d M Y', $param['EndDate'])->format('Y-m-d'). ' 24:60:60';

            $data = Client::orderBy('updated_at', 'desc')
                ->where('updated_at', '>=', $fromDate)
                ->where('updated_at', '<=', $toDate)
                ->where('status', '<>', null)
                ->paginate($page);
            $data->appends(['StartDate' => $param['StartDate'],'EndDate' => $param['EndDate']]);
        } else {
            $data = Client::where('status', '<>', null)
                ->orderBy('updated_at', 'desc')->paginate($page);
        }
        return view('admin.survey.index', compact('data'));
    }

    public function show($id){
        $data = Client::with('getSurvey')->findOrFail($id);
        foreach($data->getSurvey as $key => $index){
            if(in_array($index->question_type, array('CHECKBOX','RADIO_BUTTON','RADIO_BUTTON_RANGE')) ){
                $exp = explode(",",$index['answer']);
                $answerCheckbox = array_combine($exp, $exp);
                $data->getSurvey[$key]['questiondetail'] = Question::findOrFail($index['question_id'])->getQuestionDetail()->get();
                foreach($data->getSurvey[$key]['questiondetail'] as $item => $col){
                    if(in_array($col->id, $answerCheckbox)){
                        $data->getSurvey[$key]['questiondetail'][$item]['checked'] = 'checked';
                    }
                }
            }elseif(in_array($index->question_type, array('SORT')) ){
                $ids = explode(',', $index['answer']);
                $data->getSurvey[$key]['questiondetail'] = QuestionDetail::whereIn('id', $ids)->orderByRaw('FIELD (id, ' . $index['answer'] . ') ASC')->get();
            }
        }
        return view('admin.survey.edit', compact('data'));
    }

    public function delete($id){
        $client = Client::findOrFail($id);
        $client->getSurvey()->delete();
        $client->delete();

        return redirect()->back()->with('delete', 'Delete successfully!');
    }

    public function showEntries($item){
        if($item){
            session(['survey_show' => $item]);
        }
        return redirect()->back()->with('show', 'successfully!');
    }

}
