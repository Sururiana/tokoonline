<table>
    <thead>
        <tr>
            <th>No</th>
            <th>transaksi id</th>
            <th>produk id</th>
            <th>produk</th>
            <th>harga</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>di buat</th>
            <th>di update</th>
            {{-- <th>No</th>
            <th>Tanggal</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Harga</th>
            <th>Total</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($kas as $index => $listkas)
            <tr>
                <td> {{ $listkas->id }} </td>
                <td> {{ $listkas->transaction_id }} </td>
                <td> {{ $listkas->product_id }} </td>
                <td> {{ $listkas->product }} </td>
                <td> {{ $listkas->price }} </td>
                <td> {{ $listkas->qty }} </td>
                <td> {{ $listkas->total }} </td>
                <td> {{ $listkas->created_at }} </td>
                <td> {{ $listkas->updated_at }} </td>

                {{-- <td>{{ $loop->index + 1 }}</td>
                <td>{{ date('d-m-Y', strtotime($listkas->created_at)) }}</td>
                <td> {{ $listkas->product }} </td>
                <td> {{ $listkas->qty }} </td>
                <td> {{ "Rp. ". number_format($listkas->price,0,'.','.') }} </td>
                <td> {{ "Rp. ". number_format($listkas->total,0,'.','.') }} </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>