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

    public function getAllTypeId($type_id)
    {
        return $this->model->query()->whereUserTypeId($type_id)->get();
    }

    public function getQueryFilter($data) 
    {
        $query = $this->getQuery();

        if (isset($data['name'])) {
            $query->where(function($query) use($data) {
                $query->orWhere('first_name', 'like', '%' . trim($data['name']) . '%')
                    ->orWhere('last_name', 'like', '%' . trim($data['name']) . '%');
            });
        }

        if (isset($data['email'])) {
            $query->where('email', 'like', '%' . trim($data['email']) . '%');
        }

        if (isset($data['user_type_id'])) {
            $query->where('user_type_id', $data['user_type_id']);
        }

        if (isset($data['position_id'])) {
            $query->where('position_id', $data['position_id']);
        }

        if (isset($data['subdivision_id'])) {
            $query->whereHas('position', function($query) use ($data) {
                $query->where('subdivision_id', $data['subdivision_id']);
            });           
        }

        return $query->get();
    }
}
