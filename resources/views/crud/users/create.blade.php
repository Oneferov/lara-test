@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Создание сотрудника</h3>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{route($template->getUri().'.store')}}" class="form form-vertical">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first_name">Имя</label>
                                    <input type="text" class="form-control" name="first_name" value="{{Request::old('first_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Фамилия</label>
                                    <input type="text" class="form-control" name="last_name" value="{{Request::old('last_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="middle_name">Отчество</label>
                                    <input type="text" class="form-control" name="middle_name" value="{{Request::old('middle_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{Request::old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="text" class="form-control" name="password" value="{{Request::old('password')}}">
                                </div>
                                <div class="form-group">
                                    <label for="user_type_id">Тип</label>
                                    <select class="form-select" name="user_type_id">
                                        @foreach (\App\Models\UserType::all() as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="position_id">Должность</label>
                                    <select class="form-select" name="position_id">
                                        @foreach (\App\Models\Position::all() as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Готово</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Сбросить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
@endsection