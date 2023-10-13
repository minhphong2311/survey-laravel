<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSurvey = Client::where('status', '<>', '')->count();
        $Survey = Client::where('status', '<>', '')->orderBy('updated_at', 'desc')->limit(6)->get();

        return view('admin.dashboard', compact('totalSurvey','Survey'));
    }
}
