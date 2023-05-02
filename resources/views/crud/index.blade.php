@extends('layouts.crud')
@section('content')
    <div class="container" style="margin-bottom: 60px">
        <div class="row">
            <div class="">
                <h3>{{$template->getTitle()}}</h3>
                <hr>
                <div class="box-body">
                    @if (session()->has('message'))
                        <div class="alert alert-info">{{ session()->get('message') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
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
                            <th>
                                {{ $field['title'] }}
                                @if (isset($field['search']))
                                    @if ($field['search']['type'] === 'text')
                                        <div class="th-input">
                                            <input name="{{ $field['name'] }}" class="input-sm" type="text" placeholder="Найти...">
                                        </div>
                                    @elseif ($field['search']['type'] === 'select')
                                        <div class="th-input">
                                            <select 
                                                @if (array_key_exists($field['name'], $template->getFilters())) disabled @endif
                                                name="{{$field['name']}}" 
                                                data-source="{{ $field['search']['source'] }}" 
                                                class="form-control select-th input-sm">
                                                    <option></option>
                                            </select>
                                        </div>
                                    @endif
                                @endif
                            </th>
                        @endforeach
                        <th>Просмотр</th>
                        <th>Изменение</th>
                        <th>Удаление</th>
                    </tr>
                    </thead>

                </table>

                <script>

                    $(document).ready(function() {     
                        getList();
                        getSource();
                        closeAlert();
                    })

                    function getList(filters = null)
                    {
                        let params = filters ? `${filters}` : '';

                        @foreach ($template->getFilters() as $key => $value)
                            params += '{{$key}}' + '=' + '{{$value}}' +'&';
                        @endforeach
                       
                        $('#'+'{{$template->getUri()}}').DataTable({
                            ajax: '{{$template->getUri()}}'+'/list?'+params,
                            serverSide: true,
                            processing: true,
                            destroy: true,
                            order: [[0, 'desc']],
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
                    }

                    function destroy(id) {
                        $.ajax({
                            method: 'POST',
                            url: '{{$template->getUri()}}'+'/'+id,
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            },
                            success: function(data) {
                                if (data.message) {
                                    $('.box-body').append(`
                                        <div class="alert alert-danger">${data.message}</div>
                                    `);
                                    closeAlert();
                                } else {
                                    getList();
                                }
                            }
                        });
                    }

                    function closeAlert() {
                        setTimeout(function() {
                            $('.box-body .alert').hide(500)
                        }, 2000);
                    }

                    $(".input-sm").change(function() {
                        let filters = getFilters();
                        getList(filters);
                    });
 
                    function getFilters() {
                        let filters = '';
                        $('.input-sm').each(function (index) {
                            if ($(this).val() !== '' && $(this).attr('name') !== undefined) {
                                filters += $(this).attr('name') + "=" + $(this).val() + "&";
                            }
                        });
                        return filters;
                    }

                    function getSource() {
                        $('th select').each(function () {
                            var self = this;
                            if ($(this).data('source')) {
                                $.ajax({
                                    'url': 'source?model_name=' + $(this).data('source'),
                                    'method': 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        for (var key in data) {
                                            var newOption = new Option(data[key], key);
                                            self.appendChild(newOption);
                                        }
                                    }
                                });
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
@endsection