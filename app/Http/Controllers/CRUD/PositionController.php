<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\CRUD\CrudController;
use App\Http\Requests\PositionStoreRequest;
use App\Http\Requests\PositionUpdateRequest;
use App\Repositories\PositionRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\CRUD\PositionResource;


class PositionController extends CrudController
{
    protected $uri = 'positions';
    protected $title = 'Должности';

    protected $fields = [
        [
            'name' => 'title',
            'title' => 'Название'
        ],
        [
            'name' => 'subdivision',
            'title' => 'Подразделение'
        ],
    ];

    public function __construct(PositionRepository $positionRepository)
    {
        $this->repository = $positionRepository;
    }

    protected function list()
    {
        return DataTables::make($this->repository->getAll())
            ->setTransformer(function ($item) {
                return PositionResource::make($item)->resolve();
            })
            ->toJson();
    }

    public function store(PositionStoreRequest $request)
    {
        $this->repository->create($request->all());
        session()->flash('message', 'Элемент успешно добавлен!');
        return view('crud.index', ['template' => $this]);
    }

    public function update(PositionUpdateRequest $request, $id)
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
