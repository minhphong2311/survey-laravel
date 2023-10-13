<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, [
            'profile_name' => 'required',
            'profile_phone' => 'required',
            'profile_job_title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($data['profile_password'])) {
            $data['password'] = bcrypt($data['profile_password']);
        } else {
            $data['password'] = $user['password'];
        }

        $data['name'] = $data['profile_name'];
        $data['phone'] = $data['profile_phone'];
        $data['job_title'] = $data['profile_job_title'];

        if ($user->count())
            $user->update($data);
        return back()->with('profile', 'Profile updated successfully!');
    }
}
