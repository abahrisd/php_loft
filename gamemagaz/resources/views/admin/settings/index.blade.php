@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Settings</div>

                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="settings-container">
                            <div class="settings-container__header">Last Update User Name</div>
                            <div class="settings-container__header">Last Update User Email</div>
                            <div class="settings-container__header">Name</div>
                            <div class="settings-container__header">Value</div>
                            <div class="settings-container__header">Submit</div>
                        </div>
                        @foreach($settings as $setting)
                            <form action="{{route('settings.update', $setting->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="settings-container">
                                    <div class="settings-container__item">{{$setting->user->name}}</div>
                                    <div class="settings-container__item">{{$setting->user->email}}</div>
                                    <div class="settings-container__item">{{$setting->name}}</div>
                                    <div class="settings-container__item"><input placeholder="Значение" type="text" name="value" value="{{$setting->value}}" /></div>
                                    <div class="settings-container__item"><input type="submit"></div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
