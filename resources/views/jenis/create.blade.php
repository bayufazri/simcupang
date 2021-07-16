@extends('layouts.master')
@section('title','Tambah Data Jenis Cupang')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Tambah Data Jenis Cupang
    <a href={{ route('jenis.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
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
    <form action="{{ route('jenis.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Jenis Cupang</label>
            <input type="text" class="form-control" name="nama" placeholder="Jenis">
        </div>
        <div class="form-group col-md-6">
            <label>Ciri Khusus</label>
            <textarea class="form-control" name="ciri_khusus" placeholder="Ciri Khusus"></textarea>
        </div>
	</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    
</div>


@endsection