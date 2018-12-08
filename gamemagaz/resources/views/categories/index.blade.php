@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">categories</div>

                    <div class="card-body">
                        <a href="{{route('categories.create')}}" class="btn">
                            Create
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Category name</th>
                                <th>Category description</th>
                                <th>User</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->name}}</th>
                                    <th>{{$category->description}}</th>
                                    <th>{{isset($category->user) && $category->user->id}}</th>
                                    <th>
                                        <a href="{{route('categories.edit', [$category->id])}}" class="btn">
                                            Edit
                                        </a>
                                        <a href="{{route('products.destroy', $category->id)}}" class="btn">
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
