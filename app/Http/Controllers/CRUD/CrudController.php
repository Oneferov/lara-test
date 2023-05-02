<?php

namespace App\Http\Controllers\CRUD;


use Illuminate\Routing\Controller as BaseController;

class CrudController extends BaseController
{
    protected $repository;
    protected $uri;
    protected $title;
    protected $filters = [];
    protected $fields = [];


    protected function index()
    {
        $this->filters = request()->all();

        return view('crud.index', ['template' => $this]);
    }

    protected function create()
    {
        return view('crud.'.request()->route()->getName(), ['template' => $this]);
    }

    protected function edit($id)
    {
        $model = $this->repository->getOneById($id);
        return view('crud.'.request()->route()->getName(), ['template' => $this, 'model' => $model]);
    }

    protected function destroy($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('users.index');
        }
        catch (\Exception $e) {
            return response()->json(
                ['message' => 'Сначала удалите всех сотрудников, использующих эту модель']
            );
        }
    }

    protected function show($id)
    {
        $model = $this->repository->getOneById($id);
        return view('crud.'.request()->route()->getName(), ['template' => $this, 'model' => $model]);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function getUri()
    {
        return $this->uri;
    }
}
