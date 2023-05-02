<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\CRUD\CrudController;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\CRUD\UserResource;
use Illuminate\Http\Request;


class UserController extends CrudController
{
    protected $uri = 'users';
    protected $title = 'Сотрудники';

    protected $fields = [
        [
            'name' => 'name',
            'title' => 'ФИО',
            'search' => [
                'type' => 'text'
            ]
        ],
        [
            'name' => 'email',
            'title' => 'Email',
            'search' => [
                'type' => 'text'
            ]
        ],
        [
            'name' => 'user_type_id',
            'title' => 'Тип',
            'search' => [
                'type' => 'select',
                'source' => 'UserTypes',
            ]
        ],
        [
            'name' => 'position_id',
            'title' => 'Должность',
            'search' => [
                'type' => 'select',
                'source' => 'UserPositions',
            ]
        ],
        [
            'name' => 'subdivision_id',
            'title' => 'Подразделение',
            'search' => [
                'type' => 'select',
                'source' => 'UserSubdivisions',
            ]
        ]
    ];


    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    protected function list(Request $request)
    {
        $model = $this->repository->getQueryFilter($request->all());

        return DataTables::make($model)
            ->setTransformer(function ($item) {
                return UserResource::make($item)->resolve();
            })
            ->toJson();
    }

    public function store(UserStoreRequest $request)
    {
        $this->repository->create($request->all());
        session()->flash('message', 'Элемент успешно добавлен!');
        return view('crud.index', ['template' => $this]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $model = $this->repository->getOneById($id);
        $model->update($request->all());
        session()->flash('message', 'Элемент успешно обновлен!');
        return view('crud.'.$this->uri.'.show', ['template' => $this, 'model' => $model]);
    }
}
