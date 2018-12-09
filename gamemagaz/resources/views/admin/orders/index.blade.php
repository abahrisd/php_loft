@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>User email</th>
                                <th>User Name</th>
                                <th>Product Name</th>
                            </tr>

                            @foreach($orders as $order)
                                <tr>
                                    <th>{{$order->email}}</th>
                                    <th>{{$order->name_from_form}}</th>
                                    <th>{{$order->product->name}}</th>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
