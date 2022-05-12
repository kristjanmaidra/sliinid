<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Switches;


class SwitchBoard extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['name'];


    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

    public function switches()
    {
        return $this->hasMany(Switches::class);
    }
}
