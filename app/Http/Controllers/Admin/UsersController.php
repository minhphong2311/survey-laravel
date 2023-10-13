<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'users');
    }
    /**
     * Page users
     *
     * url: admin/users
     */
    public function index()
    {
        return view('admin.users.list');
    }

    public function data()
    {
        $data = User::select(array('id', 'name', 'email', 'created_at'));
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return view('admin.users.staff', compact('data'));
            })
            ->removeColumn('id')
            ->rawColumns(['active', 'action'])
            ->make();
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user['password'];
        }

        $data['email'] = $user['email'];

        if ($user->count())
            $user->update($data);
        return redirect('admincp/users');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            return redirect()->back()->with('message', 'Email used');
        } else {

            $validator = Validator::make($data, [
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required|min:6'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect('admincp/users');
        }
    }
}
