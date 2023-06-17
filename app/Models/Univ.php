<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Univ extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function Penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}
