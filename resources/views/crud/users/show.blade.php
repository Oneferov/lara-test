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
                            <label for="name">ФИО</label>
                            <input readonly type="text" class="form-control" name="name" value="{{$model->name}}">
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
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{route($template->getUri().'.index')}}" class="btn btn-primary me-1 mb-1">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection