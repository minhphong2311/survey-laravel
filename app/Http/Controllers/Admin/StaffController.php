<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'manage-staff');
    }

    public function index(Request $request)
    {
        $data = User::where('level', 'Staff')->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.manage-staff.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->orWhere('phone', $data['phone'])->first();
        if ($user) {
            return redirect()->back()->with('delete', 'Email or Phone used');
        } else {

            $validator = Validator::make($data, [
                'name' => 'required',
                'phone' => 'required',
                'ic_number' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = bcrypt(Str::random(5));
            User::create($data);
            return redirect()->back()->with('message', 'Add successfully!');
        }
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Delete successfully!');
    }
}
