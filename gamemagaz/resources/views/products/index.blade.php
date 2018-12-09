@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Товары</div>

                    <div style="display: {{ Request::get("success") ? 'flex' : 'none'}}; justify-content: center;margin: 20px;font-size: 20px;">
                        <div style="color: blue;">
                            Заказ размещен успешно
                        </div>
                    </div>

                    @if ($user->is_admin)
                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn">
                            Добавить
                        </a>
                    </div>
                    @endif

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th>картинка</th>
                                <th>Цена</th>
                                <th>Пользователь</th>
                                <th>Действия</th>
                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <img src="/storage/images/{{ $product->image }}" alt="Картинки нет :(">
                                    </td>
                                    <td>{{$product->price}}</td>
                                    <td>{{isset($product->user) && $product->user->id}}</td>
                                    <td>
                                        <a href="{{route('products.view', [$product->id])}}" class="btn">
                                            Просмотреть
                                        </a>
                                        @if ($user->is_admin)
                                        <a href="{{route('products.edit', [$product->id])}}" class="btn">
                                            Изменить
                                        </a>
                                        <a href="{{route('products.destroy', $product->id)}}" class="btn">
                                            Удалить
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
