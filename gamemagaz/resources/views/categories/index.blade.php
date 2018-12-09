@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>

                    @if ($user->is_admin)
                    <div class="card-body">
                        <a href="{{route('categories.create')}}" class="btn">
                            Создать категорию
                        </a>
                    </div>
                    @endif

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Пользователь</th>
                                @if ($user->is_admin)
                                <th>Действия</th>
                                @endif
                            </tr>

                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->name}}</th>
                                    <th>{{$category->description}}</th>
                                    <th>{{isset($category->user) && $category->user->id}}</th>
                                    @if ($user->is_admin)
                                    <th>
                                        <a href="{{route('categories.edit', [$category->id])}}" class="btn">
                                            Изменить
                                        </a>
                                        <a href="{{route('products.destroy', $category->id)}}" class="btn">
                                            Удалить
                                        </a>
                                    </th>
                                    @endif
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
