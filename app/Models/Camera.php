<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nette\SmartObject;

class Camera extends Model
{
    use HasFactory;


    // protected $guarded = [];

    protected $fillable = ['name', 'image', 'model', 'price', 'view_angle', 'focus_distance', 'description', 'ip'];
}
