<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Harbour extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
