<?php

namespace App\Http\Controllers\CRUD;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CrudController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $repository;
    protected $uri;
    protected $title;
    protected $fields = [];

    protected function index()
    {
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
        }
        catch (\Exception $e) {
            return response()->json(
                ['message' => $e]
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

    public function getUri()
    {
        return $this->uri;
    }
}
