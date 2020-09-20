<?php

namespace App\Exports;

use App\Http\Controllers\Web\KasController;
use App\Models\Kas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Http\Request;


class KasDetailExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('report_penjualan.cetak_excel', [
            'kas' => Kas::orderBy('created_at')->get()
        ]);
    }
}