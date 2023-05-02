<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\API\UserResource;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function search(Request $request)
    {
        return UserResource::collection(
            $this->repository->getByParams($request->only(['first_name', 'last_name', 'email']))
        );
    }
   
}
