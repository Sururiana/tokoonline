@extends('template.app')

@section('pagetitle','Detail Product')


@section('content')
<div class="box box-primary">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Nama Produk</dt>
                    <dd> {{ ucfirst($product->product) }}</dd>

                    <dt>Harga Produk</dt>
                    <dd> {{ "Rp. ". number_format($product->price,0,'.','.') }}</dd>

                    <dt>Stok Produk</dt>
                    <dd> <label for="" class="text text-primary"> {{ $product->stock }} </label></dd>

                    {{-- <dt>Description</dt>
                    <dd style="word-break: break-all;"> {{ str_limit($product->description,500,' ...') }}</dd> --}}

                </dl>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <label for="">Description</label>
                <p class="text">{{ $product->description }}</p>
            </div>
        </div>

        {{-- <div class="row"> --}}
            <div class="table">
                <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}

    </div>
</div>
@endsection