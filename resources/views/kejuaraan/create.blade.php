@extends('layouts.master')
@section('title','Tambah Kejuaraan')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Tambah Kejuaraan
    <a href={{ route('kejuaraan.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
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
    <form action="{{ route('kejuaraan.store') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama</label>
            <select class="form-control" name="id_koleksi">
                <option value="" disabled selected>Nama Cupang</option>
                @foreach ($koleksi as $koleksi)
                      <option value="{{ $koleksi->id }}">{{ $koleksi->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Nama Kontes</label>
            <input type="text" class="form-control" name="nama_kontes" placeholder="Nama Kontes">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Penyelenggara</label>
            <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara">
        </div>
        <div class="form-group col-md-6">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Foto </label>
            <input type="file" name="foto" class="form-control" placeholder="Foto">
        </div>
        <div class="form-group col-md-6">
            <button class="btn btn-primary" style="margin-top:25px; " type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection