@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Редактирование должности</h3>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{route($template->getUri().'.update', $model->id)}}" class="form form-vertical">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-body">
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" name="title" value="{{$model->title}}">
                            </div>
                            <div class="form-group">
                                <label for="subdivision_id">Подразделение</label>
                                <select class="form-select" name="subdivision_id">
                                    @foreach (\App\Models\Subdivision::all() as $item)
                                        <option value="{{$item->id}}" @if ($model->subdivision_id == $item->id) selected @endif>{{$item->title}}</option>
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