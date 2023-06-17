<?php

namespace App\Models;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penghuni extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='penghuni';

    public function kamars()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
    public function univ()
    {
        return $this->belongsToMany(Univ::class, 'penghuni_univ');
    }
}
