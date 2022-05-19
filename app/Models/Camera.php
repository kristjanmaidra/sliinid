<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Switches;
use App\Models\Location;


class Camera extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function switches()
    {
        return $this->belongsTo(Switches::class);
    }

    public function locations() 
    {
        return $this->belongsTo(Location::class);
    }

}

