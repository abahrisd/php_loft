@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Product edit</div>

                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" method="post">
                            @csrf
                            @method('put')
                            <input placeholder="Название" type="text" name="name" value="{{$product->name}}" />
                            <input placeholder="Описание" type="text" name="description" value="{{$product->description}}" />
                            <input placeholder="Цена" type="text" name="price" value="{{$product->price}}" />
                            <input placeholder="Картинка" type="file" name="image" />
                            <input type="submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
