@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Просмотр категории</div>

                    <div class="card-body">
                        <div>
                            <span>Название: {{$category->name}}</span>
                        </div>
                        <div>
                            <span>Описание: {{$category->description}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
