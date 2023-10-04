@extends('admin.main')

@section('container')
    <div class="mt-3  mb-3">
        <ul>
            <li><b>TÊM KHÁCH HÀNG: </b>{{ $curtomer->name }}</li>
            <li><b>SỐ ĐIỆN THOẠI: </b>{{ $curtomer->phone }}</li>
            <li><b>ĐỊA CHỈ: </b>{{ $curtomer->address }}</li>
            <li><b>GMAIL: </b>{{ $curtomer->email }}</li>
        </ul>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>TÊN SP</th>
                <th>GIÁ</th>
                <th>SỐ LƯỢNG SP</th>
                <th>TỔNG TIỀN</th>
            </tr>
        </thead>
        <tbody>
            @php
                $priceAll = 0;
            @endphp

            @foreach ($data as $row)      
                @php
                    $price = $row->product->price_sale != 0 ? $row->product->price_sale : $row->product->price;
                    $priceAll += $price;
                @endphp 

                <tr>
                    <td>{{ $row->product->title }}</td>
                    <td>{{ number_format($price) }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>{{ number_format($row->price) }}</td>
                </tr>
            @endforeach
        </tbody>
         
    </table>

    <div class="card-footer d-flex mt-2">
      <b>tồng tiền:</b>
      <p class="ml-auto text-danger">
        {{ number_format($priceAll) }}<sup>đ</sup>
      </p>
     </div>
@endsection