@extends('layouts.master')
@section('title','Tambah Koleksi')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Tambah Koleksi
    <a href={{ route('koleksi.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi Kesalahan pada saat penginputan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
   
<div class="panel-body">
    <form action="{{ route('koleksi.store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
        </div>
        <div class="form-group col-md-6">
            <label>Jenis Cupang</label>
            <select class="form-control" name="id_jenis">
                <option value="" disabled selected>Jenis Cupang</option>
                @foreach ($jenis as $jenis)
                      <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                @endforeach
            </select>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Harga Beli</label>
            <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli">
        </div>
        <div class="form-group col-md-6">
            <label>Nama Penjual</label>
            <select class="form-control" name="id_penjual">
                <option value="" disabled selected>Nama Penjual</option>
                @foreach ($penjual as $penjual)
                      <option value="{{ $penjual->id }}">{{ $penjual->nama }}</option>
                @endforeach
            </select>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tanggal Beli</label>
            <input type="date" class="form-control" name="tanggal_beli" placeholder="Tanggal Beli">
        </div>
        <div class="form-group col-md-6">
            <label>Foto </label>
            <input type="file" name="foto" class="form-control" placeholder="Foto">
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>keterangan</label>
            <select class="form-control" name="keterangan">
                <option value="" disabled selected>Keterangan</option>
                <option value="Hidup">Hidup</option>
                <option value="Mati">Mati</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <button class="btn btn-primary" style="margin-top:25px; " type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection