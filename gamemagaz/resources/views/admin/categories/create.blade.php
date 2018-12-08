@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Category create</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <input placeholder="Название" type="text" name="name" />
                            <input placeholder="Описание" type="text" name="description" />
                            <input type="submit">
                            {{--<button type="submit">Создать</button>--}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
