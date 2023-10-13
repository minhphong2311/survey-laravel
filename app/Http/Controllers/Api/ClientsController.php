<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    public function searchIc(Request $request)
    {
        $param = $request->all();
        $data = Client::where('ic_number', '=', $param['ic_number'])->first();
        // return response()->json(['data'=>$data], 200);
        return response()->json($data, 200);
    }
}
