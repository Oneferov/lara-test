<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    abstract public function getModelClass();

    public function setModel($model_path)
    {
        $this->model = app($model_path);
    }

    public function __construct()
    {
        $this->setModel($this->getModelClass());
    }

    public function getOneById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        $item->delete();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }
}
