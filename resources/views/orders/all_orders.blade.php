
@extends('master')
@section('title')
    Orders
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        All Orders
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Price</th>
                                <th>Currency</th>
                                <th>Financial Status</th>
                                <th>Order Name</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    @if ($row['financial_status']=="refunded")
                                    <td> {{ $row['id']}}</td>
                                    <td> {{ $row['current_subtotal_price']   }}</td>
                                    <td> {{ $row['currency'] }}</td>
                                    <td> {{ $row['financial_status'] }}</td>
                                    <td>{{ $row['line_items'][0]['name'] }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection
