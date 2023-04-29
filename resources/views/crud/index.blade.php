@extends('layouts.crud')
@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <h3>{{$template->getTitle()}}</h3>
                <hr>
                <div class="box-body">
                    @if (session()->has('message'))
                        <div class="alert alert-info">{{ session()->get('message') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-error">{{ session()->get('error') }}</div>
                    @endif
                </div>
                <a href="{{route($template->getUri().'.create')}}" class="btn btn-success">Создать</a>
                <br>
                <br>
                <table id="{{$template->getUri()}}" class="table table-bordered table-condensed table-striped" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        @foreach ($template->getFields() as $field)
                            <th>{{$field['title']}}</th>
                        @endforeach
                        <th>Просмотр</th>
                        <th>Изменение</th>
                        <th>Удаление</th>
                    </tr>
                    </thead>

                </table>

                <script>
                    $(document).ready(function() {     
                        $('#'+'{{$template->getUri()}}').DataTable({
                            ajax: '{{$template->getUri()}}'+'/list',
                            serverSide: true,
                            processing: true,
                            columns: [
                                {data: 'id', name: 'id'},
                                @foreach ($template->getFields() as $field)
                                {
                                    data: '{{ $field['name'] }}',
                                    name: '{{ $field['name'] }}',
                                },
                                @endforeach
                                {
                                    render: function (data, type, row) {
                                        return `<a href="{{$template->getUri()}}/${row.id}" class="btn btn-xs btn-primary">Show</a>`;
                                    },
                                }, 
                                {
                                    render: function (data, type, row) {
                                        return `<a href="{{$template->getUri()}}/${row.id}/edit" class="btn btn-xs btn-secondary">Edit</a>`;
                                    },
                                }, 
                                {
                                    render: function (data, type, row) {
                                        return `<button onclick="destroy(${row.id})" class="btn btn-xs btn-danger">Delete</button>`;
                                    },
                                }, 
                            ]
                        });
                    })

                    function destroy(id) {
                        $.ajax({
                            method: 'DELETE',
                            url: '{{$template->getUri()}}'+'/'+id,
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(data) {
                                if (data.message) {
                                    console.log('nihuya')
                                    $('.box-body').append(`
                                        <div class="alert alert-error">${data.message}</div>
                                    `)
                                } else {
                                    location.reload();
                                }
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
@endsection