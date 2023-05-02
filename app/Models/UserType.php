<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    const USER_TYPES_LIST = [
        1 => 'действующий офисный сотрудник',
        2 => 'архивный офисный сотрудник',
        3 => 'действующий моряк',
        4 => 'архивный моряк',
        5 => 'моряк-соискатель'
    ];

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;
}
