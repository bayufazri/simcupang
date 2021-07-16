@extends('layouts.master')
@section('title','Edit Data Penjual')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Edit Data Penjual
    <a href={{ route('penjual.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi Kesalahan Pada saat penginputan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
   
<div class="panel-body">
  <form action="{{ route('penjual.update',$penjual->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $penjual->nama }}">
        </div>
        <div class="form-group col-md-6">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk">
               <option value="" disabled selected>Silahkan Pilih</option>
               <option value="Laki-laki" {{ $penjual->jk == 'Laki-laki' ? 'selected="selected"' : ''}}>Laki-laki</option>
               <option value="Perempuan" {{ $penjual->jk == 'Perempuan' ? 'selected="selected"' : ''}}>Perempuan</option>
            </select>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>No Hp</label>
            <input type="number" class="form-control" name="no_hp" placeholder="No Hp" value="{{ $penjual->no_hp }}">
        </div>
        <div class="form-group col-md-6">
            <label>Alamat</label>
              <textarea class="form-control" name="alamat" placeholder="Alamat">{{ $penjual->alamat }}</textarea>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection