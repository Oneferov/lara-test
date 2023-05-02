<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\UserType;
use Illuminate\Http\Request;


class SourceController extends Controller
{
    public function get(Request $request)
    {
        $modelName = $request->input('model_name');
        if ($modelName === 'UserTypes') {
            return UserType::all()->pluck('title', ['id']);
        } elseif ($modelName === 'UserPositions') {
            return Position::all()->pluck('title', ['id']);
        } elseif ($modelName === 'UserSubdivisions') {
            return Position::$subdivisions;
        } else {
            $model = app('App\Models\\'.$modelName);
            return $model->all()->pluck('name', ['id']);
        }
    }
}
