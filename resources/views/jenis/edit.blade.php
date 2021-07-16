@extends('layouts.master')
@section('title','Edit Data Jenis Cupang')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Edit Data Jenis
    <a href={{ route('jenis.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
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
  <form action="{{ route('jenis.update',$jenis->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Jenis</label>
            <input type="text" class="form-control" name="nama" placeholder="Jenis" value="{{ $jenis->nama }}">
        </div>
        <div class="form-group col-md-6">
            <label>Ciri Khusus</label>
            <textarea class="form-control" name="ciri_khusus" placeholder="Ciri Khusus">{{ $jenis->ciri_khusus }}</textarea>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection