@extends('template.app')

@section('pagetitle','Data Keuangan')
@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
            <br>
                <form action="keuangan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                        <input type="date" class="form-control input-sm" id="from" name="from">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control input-sm" id="to" name="to">
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-sm" name="search" >Cari</button>
                            <button type="submit" class="btn btn-success btn-sm" name="exportExcel" >Cetak</button>

                        </div>
                        <a class="btn btn-danger"  href="{{ route('kas.cetak_excel') }}">Cetak Semua</a>
                    </div>
                </div>
                </form>
                <br>

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p> Hasil Penjualan </p>
                        <h3>{{ "Rp ". number_format($grandtotal,0,'.','.') }}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bar-chart"></i>
                    </div>
                </div>

                <table class="table table-striped table-hover table-responsive">
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Harga Barang</th>
                    <th>Total Pembelian</th>
                    <th>Total Modal</th>
                    <th>Laba</th>
                    </tr>
                    @foreach ($keuangan as $keuangans)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ date('d-m-Y', strtotime($keuangans->created_at)) }}</td>
                            <td>{{ $keuangans->product }}</td>
                            <td>{{ $keuangans->qty }}</td>
                            <td>{{ "Rp ". number_format($keuangans->price,0,'.','.') }}</td>
                            <td>{{ "Rp ". number_format($keuangans->total,0,'.','.') }}</td>
                            <td>{{ "Rp ". number_format( ($keuangans->price - 50000) * $keuangans->qty ,0,'.','.') }}</td>

                            <td>{{ "Rp ". number_format( ($keuangans->total ) - ($keuangans->price - 50000) * $keuangans->qty ,0,'.','.') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- /.box-body -->
@endsection