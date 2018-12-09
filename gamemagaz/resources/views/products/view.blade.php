@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product view</div>

                    <div class="card-body">
                        <div>
                            <span>Название: {{$product->name}}</span>
                        </div>
                        <div>
                            <span>Описание: {{$product->description}}</span>
                        </div>
                        <div>
                            <span>Цена: {{$product->price}}</span>
                        </div>

                        <button id="buyButton">Купить</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="popup" class="vp4__buy-popup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <button id="popup-close" class="vp4__buy-popup--close">X</button>
                    <div class="card">
                        <div class="card-header">Для покупки свяжитесь с менеджером</div>

                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <form action="{{route('products.buy')}}" method="post">
                                @csrf
                                <input style="display: none" type="text" name="product_id" value="{{$product->id}}" />
                                <input placeholder="Имя" type="text" name="name" />
                                <input placeholder="Email" type="email" name="email" value="{{$email}}" />
                                <input type="submit">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
