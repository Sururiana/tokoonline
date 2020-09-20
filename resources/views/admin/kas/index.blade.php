@extends('template.app')

@section('pagetitle','Data Penjualan')

@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
          <a class="btn btn-danger"  href="{{ route('kas.cetak_excel') }}">Cetak</a>
            @if( Request::get('start_date') != "" && Request::get('end_date') != "")
              <a class="btn btn-success"  href="{{ route('kas.index') }}">Semua Data</a>
            @endif
              <br/>
              <br/>
              <form method="get" action="{{route('kas.index')}}">
                <div class="form-group">
                <label for="nama_produk" class="col-sm-2 control-label">Cari dengan tanggal</label>
                  <div class="col-sm-4">
                    <input type="text"
                    readonly name="start_date"
                    placeholder="Tanggal awal"
                    class="datepicker-here form-control"
                    data-language='en'
                    data-position='bottom left' />
                  </div>

                  <div class="col-sm-4">
                  <input type="text"
                    readonly name="end_date"
                    placeholder="Tanggal akhir"
                    class="datepicker-here form-control"
                    data-language='en'
                    data-position='bottom left'
                    />
                  </div>

                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                  </div>
                </div>
              </form>
        </div>
        <div class="box-body">
          @if( Request::get('start_date') != "" && Request::get('end_date') != "")
          <div class="alert alert-success alert-block">
            Hasil Pencarian Transaksi Masuk Dari Tanggal :  {{ $start_date }} s/d  {{$end_date}}
          </div>
          @endif
        </div>

        <div class="small-box bg-aqua">
          <div class="inner">
              <p> Hasil Penjualan </p>
              <h3>{{ "Rp. ". number_format($grandtotal,0,'.','.') }}</h3>
          </div>
          <div class="icon">
              <i class="fa fa-bar-chart"></i>
          </div>
        </div>

        <div class="table">
          <table class="table table-striped table-hover table-responsive" id="table">
            <thead>
              <tr>
                <th style="text-align: center;">No.</th>
                <th>Tanggal</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Total</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($kas as $index => $listkas)
              <tr>
                <td> {{ $index + $kas->firstItem()}} </td>
                <td>{{ date('d-m-Y', strtotime($listkas->created_at)) }}</td>
                <td> {{ $listkas->product }} </td>
                <td> {{ $listkas->qty }} </td>
                <td> {{ "Rp. ". number_format($listkas->price,0,'.','.') }} </td>
                <td> {{ "Rp. ". number_format($listkas->total,0,'.','.') }} </td>
              </tr>
              @endforeach
            </tbody>

          </table>
          <div class="pull-right">
            {!! $kas->links() !!}
          </div>
        </div>
      </div>
        <!-- /.box-body -->
@endsection