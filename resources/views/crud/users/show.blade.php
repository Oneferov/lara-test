@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Просмотр сотрудника</h3>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first_name">Имя</label>
                            <input readonly type="text" class="form-control" name="first_name" value="{{$model->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Фамилия</label>
                            <input readonly type="text" class="form-control" name="last_name" value="{{$model->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="middle_name">Отчество</label>
                            <input readonly type="text" class="form-control" name="name" value="{{$model->middle_name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input readonly type="text" class="form-control" name="email" value="{{$model->email}}">
                        </div>
                        <div class="form-group">
                            <label for="user_type_id">Тип</label>
                            <input readonly type="text" class="form-control" name="user_type_id" value="{{$model->user_type->title}}">
                        </div>
                        <div class="form-group">
                            <label for="position_id">Должность</label>
                            <input readonly type="text" class="form-control" name="position_id" value="{{$model->position->title}}">
                        </div>
                        <div class="form-group">
                            <label for="subdivision_id">Подразделение</label>
                            <input readonly type="text" class="form-control" name="subdivision_id" value="{{$model->position->subdivision}}">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{route($template->getUri().'.edit', $model->id)}}" class="btn btn-xs btn-secondary me-1 mb-1">Редактировать</a>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <form method="POST" action="{{route($template->getUri().'.destroy', $model->id)}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Удалить</button>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{route($template->getUri().'.index')}}" class="btn btn-primary me-1 mb-1">Назад</a>
                    </div>           
                </div>
            </div>
        </div>
    </div> 
@endsection