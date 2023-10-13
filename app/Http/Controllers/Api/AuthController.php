<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string',
            'ic_number' => 'required|string',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(5)),
            'phone' => $request->phone,
            'ic_number' => $request->ic_number,
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //         'remember_me' => 'boolean'
    //     ]);
    //     $credentials = request(['email', 'password']);
    //     if (!Auth::attempt($credentials))
    //         return response()->json([
    //             'message' => 'Unauthorized'
    //         ], 401);
    //     $user = $request->user();
    //     $tokenResult = $user->createToken('Personal Access Token');
    //     $token = $tokenResult->token;
    //     if ($request->remember_me)
    //         $token->expires_at = Carbon::now()->addWeeks(1);
    //     $token->save();
    //     return response()->json([
    //         'access_token' => $tokenResult->accessToken,
    //         'token_type' => 'Bearer',
    //         'expires_at' => Carbon::parse(
    //             $tokenResult->token->expires_at
    //         )->toDateTimeString()
    //     ]);
    // }

    public function login(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
          'phone' => 'required',
          'ic_number' => 'required'
          ]);
        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()->first()],400);
        }

        $user = User::where('phone', '=', $data['phone'])->where('ic_number', '=', $data['ic_number'])->first();
        if($user)
        {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            return response()->json([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "ic_number" => $user->ic_number,
                "phone" => $user->phone,
                "address" => $user->address,
                "surveys_completed" => $user->surveysCompleted->count(),
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }
        return response()->json(['error'=>'Incorrect phone number or IC number.'],400);
    }
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {

        return response()->json([
            "id" => $request->user()->id,
            "name" => $request->user()->name,
            "email" => $request->user()->email,
            "ic_number" => $request->user()->ic_number,
            "phone" => $request->user()->phone,
            "address" => $request->user()->address,
            "surveys_completed" => $request->user()->surveysCompleted->count(),
        ]);

        // return response()->json($request->user());
    }
}
