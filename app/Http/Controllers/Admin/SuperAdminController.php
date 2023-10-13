<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'manage-superadmin');
    }

    public function index(Request $request)
    {
        $data = User::where('level', 'Superadmin')->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.manage-superadmin.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            return redirect()->back()->with('delete', 'Email used');
        } else {

            $validator = Validator::make($data, [
                'name' => 'required',
                'phone' => 'required',
                'job_title' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = bcrypt($data['password']);
            $data['level'] = 'Superadmin';
            User::create($data);
            return redirect()->back()->with('message', 'Add successfully!');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($data, [
            'name'.$id => 'required',
            'phone'.$id => 'required',
            'job_title'.$id => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($data['password'.$id])) {
            $data['password'] = bcrypt($data['password'.$id]);
        } else {
            $data['password'] = $user['password'];
        }

        $data['name'] = $data['name'.$id];
        $data['phone'] = $data['phone'.$id];
        $data['job_title'] = $data['job_title'.$id];

        if ($user->count())
            $user->update($data);
        return redirect()->back()->with('message', 'Update successfully!');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Delete successfully!');
    }
}
