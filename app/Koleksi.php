<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksi';
    protected $fillable = [
        'nama','id_jenis','harga_beli','id_penjual','tanggal_beli','foto','keterangan'
    ];

    public function jenis()
    {
        return $this->belongsTo('App\Jenis', 'id_jenis');
    }
    public function penjual()
    {
        return $this->belongsTo('App\Penjual', 'id_penjual');
    }
}
