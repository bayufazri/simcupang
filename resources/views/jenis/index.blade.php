@extends('layouts.master')
@section('title','Data Jenis Cupang')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Data Jenis Cupang</h3>
       @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
</div>
<a href="{{ route('jenis.create') }}" class="btn btn-success" style="margin-left:25px;margin-bottom:20px;"><i class="fa fa-plus" style="margin-right:10px; "></i>Tambah Data</a>

<div class="panel-body">
    <div class="panel-body no-padding">
        
        <table class="table table-bordered"  id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Ciri Khusus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis as $jenis)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $jenis->nama }}</td>
                    <td>{{ $jenis->ciri_khusus }}</td>
                    <td>
                        <form action="{{ route('jenis.destroy', $jenis->id) }}" method="POST">
                           <a class="btn btn-info btn-action" href="{{ route('jenis.edit',$jenis->id) }}"><i class="fa fa-pencil"></i></a>
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