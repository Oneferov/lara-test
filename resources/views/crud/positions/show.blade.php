@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Просмотр должности</h3>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input readonly type="text" class="form-control" name="title" value="{{$model->title}}">
                        </div>
                        <div class="form-group">
                            <label for="subdivision_id">Подразделение</label>
                            <input readonly type="text" class="form-control" name="subdivision_id" value="{{$model->subdivision}}">
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