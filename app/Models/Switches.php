<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SwitchBoard;
use App\Models\Camera;


class Switches extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['name', 'ip'];


    public function switchboard()
    {
        return $this->belongsTo(SwitchBoard::class);
    }

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }
}
