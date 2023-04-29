<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    const SUBDIVISION_OFFICE = 1;
    const SUBDIVISION_PORT = 2;

    protected $fillable = [
        'subdivision_id',
        'title'
    ];

    public static $subdivisions = [
        self::SUBDIVISION_OFFICE => 'Офис',
        self::SUBDIVISION_PORT => 'Порт'
    ];

    public $timestamps = false;

    public function getSubdivisionAttribute()
    {
        if($this->subdivision_id !== null){
            return self::$subdivisions[$this->subdivision_id];
        }
    }
}
