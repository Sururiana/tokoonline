<?php

namespace App\Http\Controllers\Web;

use App\Exports\KeuanganExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\User;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class KeuanganController extends Controller
{
    public function index(Request $req){
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search'))
            {
                // select search
                $search = DB::select("SELECT * FROM details_transactions WHERE created_at BETWEEN '$from' AND '$to'");
                $grandtotal = Kas::whereBetween('created_at',[$from,$to])->orderBy('total')->sum('total');

                return view('admin.keuangan.import',['keuangan' => $search],compact('grandtotal'));
            }
                elseif($req->has('exportExcel'))

                // select Excel
                return Excel::download(new KeuanganExport($from, $to), 'Excel-reports.xlsx');
            {
        }
        }
            else
        {
            //select all
            $keuangan = DB::select('SELECT * FROM details_transactions');
            $grandtotal = Kas::orderBy('total')->sum('total');
            return view('admin.keuangan.import',['keuangan' => $keuangan], compact('grandtotal'));
        }
    }
}
