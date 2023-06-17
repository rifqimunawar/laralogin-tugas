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
        // MANY TO MANY RELATION
        public function mahasiswa()
        {
            return $this->belongsToMany('App\Models\Mahasiswa')->withPivot(['nilai']);
        }
        // ./MANY TO MANY RELATION
}
