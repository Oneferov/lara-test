<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\CRUD\CrudController;
use App\Http\Requests\UserTypeStoreRequest;
use App\Http\Requests\UserTypeUpdateRequest;
use App\Repositories\UserTypeRepository;
use App\Http\Resources\CRUD\UserTypeResource;
use Yajra\DataTables\Facades\DataTables;


class UserTypeController extends CrudController
{
    protected $uri = 'user_types';
    protected $title = 'Типы сотрудников';

    protected $fields = [
        [
            'name' => 'title',
            'title' => 'Название'
        ]
    ];

    public function __construct(UserTypeRepository $userTypeRepository)
    {
        $this->repository = $userTypeRepository;
    }

    protected function list()
    {
        return DataTables::make($this->repository->getAll())
            ->setTransformer(function ($item) {
                return UserTypeResource::make($item)->resolve();
            })
            ->toJson();
    }

    public function store(UserTypeStoreRequest $request)
    {
        $this->repository->create($request->all());
        session()->flash('message', 'Элемент успешно добавлен!');
        return view('crud.index', ['template' => $this]);
    }

    public function update(UserTypeUpdateRequest $request, $id)
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
