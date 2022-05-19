<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Harbour;
use App\Models\SwitchBoard;

class Location extends Model
{
    use HasFactory;

    
    // protected $fillable = ['name', 'harbour_id'];
    protected $guarded = [];

    public function harbours()
    {
        return $this->belongsTo(Harbour::class);
    }

    public function switchboards()
    {
        return $this->hasMany(SwitchBoard::class);
    }

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }
}
