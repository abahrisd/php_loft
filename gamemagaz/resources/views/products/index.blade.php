@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn">
                            Create
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Product</th>
                                <th>Product price</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <th>{{$product->name}}</th>
                                    <th>{{$product->price}}</th>
                                    <th>{{isset($product->user) && $product->user->id}}</th>
                                    <th>
                                        <a href="{{route('products.edit', [$product->id])}}" class="btn">
                                            Edit
                                        </a>
                                        <a href="{{route('products.view', [$product->id])}}" class="btn">
                                            View
                                        </a>
                                        <a href="{{route('products.destroy', $product->id)}}" class="btn">
                                            Delete
                                        </a>
                                    </th>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
