@extends('template.app')

@section('pagetitle','Transaction')


@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th>Telfon</th>
                            {{-- <th>Nomor Resi</th> --}}
                            <th width="200px">Alamat</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                            <th>Bukti DP</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($transactions as $index => $tra)
                    <tr>
                        <td>{{ $index + $transactions->firstItem()}}</td>
                        <td>{{ $tra->transaction_code }}</td>
                        {{-- <td>{{ ( $tra ->status_transaction == 'pending') ? '-' : $tra->resi_code  }}</td> --}}
                        <td>{{$tra->phone}} </td>
                        <td>{{$tra->destination}} </td>
                        <td>{{ ucfirst($tra->userRelation->name) }}</td>
                        <td>{{ "Rp. ". number_format ($tra->grandtotal,0,'.','.') }}</td>
                        <td>{{ date('d-m-Y', strtotime($tra->date_transaction)) }}</td>

                        <td>
                            @if ( $tra->down_payment != null )
                                <img src="{{ asset('uploads/'.$tra->down_payment) }}" alt="" width="120px" height="120px">
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if ( $tra->proof_of_payment != null )
                                <img src="{{ asset('uploads/'.$tra->proof_of_payment) }}" alt="" width="120px" height="120px">
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if ( $tra->status_transaction == 'waiting')
                                <span class="label label-default">WAITING</span>

                            @elseif ( $tra->status_transaction == 'downpay')
                                <span class="label label-default">DOWNPAY</span>

                            @elseif ( $tra->status_transaction == 'pending')
                                <span class="label label-warning">PENDING</span>

                            @elseif ( $tra->status_transaction == 'process')
                                <span class="label label-primary">PROCESS</span>

                            @elseif ( $tra->status_transaction == 'send')
                                <span class="label label-success">SEND</span>

                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('transaction.show',$tra->id)}}"
                                class="btn btn-xs btn-primary">
                                <span class="fa fa-external-link"></span>
                            </a>

                            @if ( $tra->status_transaction == 'pending' )
                                <a href="{{ route('transaction.status',$tra->id) }}" class="btn btn-xs btn-success">
                                    <span class="fa fa-check">

                                    </span>
                                </a>
                            @endif

                            {{-- [opsi] --}}
                        </td>
                    </tr>

                    @endforeach
                    <tbody>
                    </tbody>
                </table>

                <div class="pull-right">
                    {!! $transactions->links() !!}
                </div>
           </div>
        </div>
        <!-- /.box-body -->
@endsection