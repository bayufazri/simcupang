<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejuaraan extends Model
{
    protected $table = 'kejuaraan';
    protected $fillable = [
        'id_koleksi','nama_kontes','penyelenggara','keterangan','foto'
    ];

    public function koleksi(){
        return $this->belongsTo('App\Koleksi', 'id_koleksi');
    }
}
