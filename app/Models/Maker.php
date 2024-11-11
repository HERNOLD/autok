<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;

    public $timestamps=false;

    function models()
    {
        return $this->hasMany(Models::class);
    }
}
