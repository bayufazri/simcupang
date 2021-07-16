@extends('layouts.master')
@section('title','kejuaraanku')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">kejuaraan Cupangku</h3>
       @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
</div>
<a href="{{ route('kejuaraan.create') }}" class="btn btn-success" style="margin-left:25px;margin-bottom:20px;"><i class="fa fa-plus" style="margin-right:10px; "></i>Tambah Data</a>

<div class="panel-body">
    <div class="panel-body no-padding">
        
        <table class="table table-bordered"  id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Cupang</th>
                    <th>Nama Kontes</th>
                    <th>Penyelenggara</th>
                    <th>Keterangan</th>
                    <th>Bukti Kegiatan</th>
                    <th>Action</th>
                </tr>
            </thead>
             @foreach ($kejuaraan as $kejuaraan)
            <tbody>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $kejuaraan->koleksi['nama'] }}</td>
                    <td>{{ $kejuaraan->nama_kontes }}</td>
                    <td>{{ $kejuaraan->penyelenggara }}</td>
                    <td>{{ $kejuaraan->keterangan }}</td>
                    <td><img class="card-img-top" src="/assets/img/{{ $kejuaraan->foto }}" alt="" style="width:100px;height:100px;margin:5px"></td>
                    
                    <td>
                        <form action="{{ route('kejuaraan.destroy', $kejuaraan->id) }}" method="POST">
                            {{-- <a class="btn btn-primary btn-action" href="{{ route('kejuaraan.show',$kejuaraan->id) }}"><i class="fa fa-eye"></i></a> --}}
                            <a class="btn btn-info btn-action" href="{{ route('kejuaraan.edit',$kejuaraan->id) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Anda Yakin ?')"><i class="fa fa-trash"></i></button>
                        </form>
                   </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>


@endsection