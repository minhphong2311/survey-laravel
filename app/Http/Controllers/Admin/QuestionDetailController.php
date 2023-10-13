<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\QuestionDetail;
use DataTables;
use Validator;

class QuestionDetailController extends Controller
{
    public function store(Request $request, $question_id)
    {

        $data = $request->all();
        if (!isset($data['other']))
            $data['other'] = false;
        $question = QuestionDetail::orderBy('sort', 'desc')->first();
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
        $data['question_id'] = $question_id;

        $result = QuestionDetail::create($data);
        return redirect()->back()->with('success', 'Add successfully!');
    }

    public function update(Request $request, $id)
    {
        $questionDetail = QuestionDetail::findOrFail($id);
        $data = $request->all();
        if (!isset($data['other']))
            $data['other'] = false;

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($questionDetail->count())
            $questionDetail->update($data);
        return redirect()->back()->with('update_detail', 'Update successfully!');
    }

    public function delete($id)
    {
        QuestionDetail::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Delete row successfully!');
    }
}
