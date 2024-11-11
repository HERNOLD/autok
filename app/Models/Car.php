<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps=false;

    function maker()
    {
        return $this->belongsTo(Maker::class);
    }

    function model()
    {
        return $this->belongsTo(Models::class);
    }

    function fuel()
    {
        return $this->belongsTo(Fuels::class);
    }

    function body()
    {
        return $this->belongsTo(Body::class);
    }

    function gear()
    {
        return $this->belongsTo(GearShift::class);
    }

    function color()
    {
        return $this->belongsTo(Color::class);
    }
}