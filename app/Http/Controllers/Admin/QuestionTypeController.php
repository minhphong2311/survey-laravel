<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\QuestionType;
use DataTables;
use Validator;

class QuestionTypeController extends Controller
{

    public function __construct()
    {
        view()->share('type', 'question-type');
    }

    public function index()
    {
        $data = QuestionType::all();
        return view('admin.question-type.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $questionType = QuestionType::findOrFail($id);
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

        if ($questionType->count())
            $questionType->update($data);
        return redirect()->back()->with('update', 'Update successfully!');
    }

    public function delete($id)
    {
        QuestionType::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Delete row successfully!');
    }
}
