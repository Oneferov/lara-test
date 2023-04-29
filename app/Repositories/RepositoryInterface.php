<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

  public function getModelClass();

  public function getOneById($id);

  public function getAll();

  public function getQuery();

  public function delete($id);

  public function create(array $data);

  public function update(array $data, $id);
}