<?php

namespace App\Http\Controllers;

use App\Imports\ThesesImport;
use App\Models\These;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function fileImport(Request $request)
    {
        ini_set('max_execution_time', 7200); //2h
        Excel::import(new ThesesImport, $request->file('file')->store('temp'), );
        DB::table('theses')->where('id_these', 'LIKE', 'Identifiant de la these')->delete();
        return back();
    }

    public function index() {
        return view('import');
    }
}
