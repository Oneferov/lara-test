<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\CRUD\CrudController;
use App\Http\Requests\SubdivisionStoreRequest;
use App\Http\Requests\SubdivisionUpdateRequest;
use App\Http\Resources\CRUD\SubdivisionResource;
use App\Repositories\SubdivisionRepository;

use Yajra\DataTables\Facades\DataTables;


class SubdivisionController extends CrudController
{
    protected $uri = 'subdivisions';
    protected $title = 'Подразделения';

    protected $fields = [
        [
            'name' => 'title',
            'title' => 'Название'
        ]
    ];

    public function __construct(SubdivisionRepository $subdivisionRepository)
    {
        $this->repository = $subdivisionRepository;
    }

    protected function list()
    {
        return DataTables::make($this->repository->getAll())
            ->setTransformer(function ($item) {
                return SubdivisionResource::make($item)->resolve();
            })
            ->toJson();
    }

    public function store(SubdivisionStoreRequest $request)
    {
        $this->repository->create($request->all());
        session()->flash('message', 'Элемент успешно добавлен!');
        return view('crud.index', ['template' => $this]);
    }

    public function update(SubdivisionUpdateRequest $request, $id)
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
                ['message' => 'Сначала удалите все данные использующие эту модель']
            );
        }
    }
}
