<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Switches;


class Camera extends Model
{
    use HasFactory;


    protected $guarded = [];
    // protected $fillable = ['name', 'switches_id', 'image','username', 'password', 'location',  'model', 'price', 'view_angle', 'focus_distance', 'description', 'ip'];

    public function switches()
    {
        return $this->belongsTo(Switches::class);
    }

}

