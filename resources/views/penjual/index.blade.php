@extends('layouts.master')
@section('title','Data Penjual')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Data Penjual</h3>
       @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
</div>
<a href="{{ route('penjual.create') }}" class="btn btn-success" style="margin-left:25px;margin-bottom:20px;"><i class="fa fa-plus" style="margin-right:10px; "></i>Tambah Data</a>

<div class="panel-body">
    <div class="panel-body no-padding">
        
        <table class="table table-bordered"  id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjual as $penjual)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $penjual->nama }}</td>
                    <td>{{ $penjual->jk }}</td>
                    <td>{{ $penjual->no_hp }}</td>
                    <td>{{ $penjual->alamat }}</td>
                    <td>
                        <form action="{{ route('penjual.destroy',$penjual->id) }}" method="POST">
                            <a class="btn btn-info btn-action" href="{{ route('penjual.edit',$penjual->id) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Anda Yakin ?')"><i class="fa fa-trash"></i></button>
                        </form>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection