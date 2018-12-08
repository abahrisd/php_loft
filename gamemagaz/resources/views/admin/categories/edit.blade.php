@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Category edit</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.update', $category->id)}}" method="post">
                            @csrf
                            @method('put')
                            <input placeholder="Название" type="text" name="name" value="{{$category->name}}" />
                            <input placeholder="Описание" type="text" name="description" value="{{$category->description}}" />
                            <input type="submit">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
