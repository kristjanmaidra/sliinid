<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Harbour;

class Location extends Model
{
    use HasFactory;

    
    protected $fillable = ['name', 'harbour_id'];

    public function harbours()
    {
        return $this->belongsTo(Harbour::class);
    }
}
