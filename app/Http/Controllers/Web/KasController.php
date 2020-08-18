<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DetailsTransaction;
use App\Models\Kas;
use Carbon\Carbon;

class KasController extends Controller
{
    public function index(Request $request){
        $kas = Kas::orderBy('created_at','asc')->paginate(10);

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $grandtotal = Kas::orderBy('total')->sum('total');

        if ($start_date != "" && $end_date != "")
        {
            $kas = Kas::whereBetween('created_at',[$start_date,$end_date])->orderBy('created_at','asc')->paginate(10);
            $grandtotal = Kas::whereBetween('created_at',[$start_date,$end_date])->orderBy('total')->sum('total');

            $start_date = \Carbon\Carbon::parse($start_date)->format('d-F-Y');
            $end_date = \Carbon\Carbon::parse($end_date)->format('d-F-Y');
        }

        return view('admin.kas.index',compact('kas','start_date','end_date','grandtotal'));
    }
}
