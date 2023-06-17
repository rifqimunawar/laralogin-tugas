<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Univ extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function penghuni()
    {
        return $this->belongsToMany(Penghuni::class, 'penghuni_univ');
    }
}
