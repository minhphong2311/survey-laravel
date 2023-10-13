<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\ClientImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'client');
    }

    public function index(Request $request)
    {
        $page = $request->session()->get('client_show') ? $request->session()->get('client_show') : '10';

        $data = Client::where('status', null)->orderBy('created_at', 'desc')->paginate($page);

        return view('admin.client.index', compact('data'));
    }

    public function showEntries($item)
    {
        if ($item) {
            session(['client_show' => $item]);
        }
        return redirect()->back()->with('show', 'successfully!');
    }

    public function delete($id)
    {
        Client::findOrFail($id)->delete();

        return redirect()->back()->with('delete', 'Delete successfully!');
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('import');
        $import = new ClientImport;
        $import->import($file);
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Imported successfully!');
    }
}
