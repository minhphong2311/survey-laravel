<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\QuestionType;

use DataTables;
use Validator;

class QuestionController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'question');
    }
    public function index(Request $request)
    {
        $page = $request->session()->get('question_show') ? $request->session()->get('question_show') : '10';

        $data = Question::with('getQuestionType')->orderBy('sort', 'asc')->paginate($page);

        return view('admin.question.index', compact('data'));
    }

    public function create()
    {
        $questionType = QuestionType::where('active', 1)->get();
        return view('admin.question.create', compact('questionType'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $question = Question::orderBy('sort', 'desc')->first();
        if ($question) {
            $data['sort'] = $question['sort'] + 1;
        } else {
            $data['sort'] = 1;
        }
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $result = Question::create($data);
        if ( in_array($result->getQuestionType->code, array('CHECKBOX','RADIO_BUTTON','RADIO_BUTTON_RANGE','SORT')) ) {
            return redirect('admincp/question/edit/' . $result->id);
        } else {
            return redirect('admincp/question');
        }
    }

    public function show($id)
    {
        $data = Question::where('id', $id)->first();
        $questionType = QuestionType::where('active', 1)->get();

        return view('admin.question.edit', compact('data', 'questionType'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $data = $request->all();
        if (!isset($data['active']))
            $data['active'] = 0;

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($question->count())
            $question->update($data);

        if ( in_array($question->getQuestionType->code, array('CHECKBOX','RADIO_BUTTON','RADIO_BUTTON_RANGE','SORT')) ) {
            return redirect()->back()->with('update', 'Update successfully!');
        } else {
            return redirect('admincp/question');
        }
    }

    public function delete($id)
    {
        Question::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Delete question successfully!');
    }

    public function showEntries($item)
    {
        if ($item) {
            session(['question_show' => $item]);
        }
        return back()->with('show', 'successfully!');
    }
}
