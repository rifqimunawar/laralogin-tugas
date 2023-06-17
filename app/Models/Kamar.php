<?php

namespace App\Models;

use App\Models\Penghuni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);

    }
}
