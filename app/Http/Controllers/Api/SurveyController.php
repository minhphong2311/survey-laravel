<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Survey;
use App\Question;
use App\QuestionDetail;

class SurveyController extends Controller
{
    public function survey(Request $request)
    {
        $param = $request->all();
        $client = Client::where(['id' => $param['client_id'], 'status' => null])->first();
        if(isset($client)){
            $question = Question::where('active', '1')->orderBy('sort', 'asc')->get();
            if ($question) {
                foreach ($question as $item) {
                    $data['answer_other'] = '';
                    $data['client_id'] = $param['client_id'];
                    $data['question_id'] = $item->id;
                    $data['question'] = $item->name;
                    $data['question_type'] = $item->getQuestionType->code;
                    if($item->getQuestionType->code == 'SHOW_IC'){
                        $data['answer'] = 'SHOW_IC';
                    }else{
                        $data['answer'] = $param['question'][$item->id];
                    }

                    if($item->getQuestionType->code == 'CHECKBOX'){
                        $checkOther = QuestionDetail::where('other','1')->whereIn('id', explode(",",$param['question'][$item->id]) )->first();
                        if($checkOther){
                            $data['answer_other'] = $param['answer_other'][$item->id];
                        }
                    }
                    Survey::create($data);
                }
            }
            $upClient = Client::where(['id' => $param['client_id']])->first();
            if ($upClient->count())
                $upClient->update([
                    'user_id' => $request->user()->id,
                    'status' => 1
                ]);
            return response()->json(['message'=>"Submitted Successfully!"],200);
        }else{
            return response()->json(['error'=>"IC number did the survey"],400);
        }
    }
}
