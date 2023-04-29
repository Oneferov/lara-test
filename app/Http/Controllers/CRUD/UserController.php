<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\CRUD\CrudController;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\CRUD\UserResource;


class UserController extends CrudController
{
    protected $uri = 'users';
    protected $title = 'Сотрудники';

    protected $fields = [
        [
            'name' => 'name',
            'title' => 'ФИО'
        ],
        [
            'name' => 'email',
            'title' => 'Email'
        ],
        [
            'name' => 'user_type.title',
            'title' => 'Тип'
        ],
        [
            'name' => 'position.title',
            'title' => 'Должность'
        ],
        [
            'name' => 'position.subdivision',
            'title' => 'Подразделение'
        ]
    ];

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    protected function list()
    {
        return DataTables::make($this->repository->getAll())
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

    public function destroy($id)
    {
        try {
            $this->repository->delete($id);
        }
        catch (\Exception $e) {
            return response()->json(
                ['message' => $e]
            );
        }
    }
}
