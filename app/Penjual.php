<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = "penjual";
    protected $fillable = [
        'nama','jk','no_hp','alamat'
    ];

    public function koleksi(){
        return $this->hasOne('App\Koleksi');
    }
}
