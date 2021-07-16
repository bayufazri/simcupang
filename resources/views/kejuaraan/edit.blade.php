@extends('layouts.master')
@section('title','Edit Kejuaraan')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Edit Kejuaraan
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
    <form action="{{ route('kejuaraan.update', $kejuaraan->id) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama</label>
            <select class="form-control" name="id_koleksi">
                <option value="" disabled selected>Nama Cupang</option>
                @foreach ($koleksi as $koleksi)
                <option value="{{ $koleksi->id }}" {{ $koleksi->id == $kejuaraan->id_koleksi ? 'selected="selected"' : ''}}>
                    {{ $koleksi->nama }}
                </option>     
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Nama Kontes</label>
            <input type="text" class="form-control" name="nama_kontes" placeholder="Nama Kontes" value="{{ $kejuaraan->nama_kontes }}">
        </div>
    
     <div class="form-row">
        <div class="form-group col-md-6">
            <label>Penyelenggara</label>
            <input type="text" class="form-control" name="penyelenggara" placeholder="penyelenggara" value="{{ $kejuaraan->penyelenggara }}">
        </div>
        <div class="form-group col-md-6">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="keterangan" value="{{ $kejuaraan->keterangan }}">
        </div>
     </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Foto </label>
            <input type="file" name="foto" class="form-control" placeholder="Foto" value="{{ $kejuaraan->foto }}">
        </div>
        <div class="form-group col-md-6">
            <button class="btn btn-primary" style="margin-top:25px; " type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection