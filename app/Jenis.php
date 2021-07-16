<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = "jenis";
    protected $fillable = [
        'nama','ciri_khusus'
    ];

    public function koleksi(){
        return $this->hasOne('App\Koleksi');
    }
}
