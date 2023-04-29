<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository
{
    public function getModelClass()
    {
        return User::class;
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        
        return $this->model->create($data);
    }
}
