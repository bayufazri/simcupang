@extends('layouts.master')
@section('title','Koleksiku')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Koleksi Cupangku</h3>
       @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
</div>
<a href="{{ route('koleksi.create') }}" class="btn btn-success" style="margin-left:25px;margin-bottom:20px;"><i class="fa fa-plus" style="margin-right:10px; "></i>Tambah Data</a>

<div class="panel-body">
    <div class="panel-body no-padding">
        
        <table class="table table-bordered"  id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Cupang</th>
                    <th>Jenis</th>
                    <th>Harga Beli</th>
                    <th>Penjual</th>
                    <th>Tanggal Beli</th>
                    <th>Foto</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($koleksi as $koleksi)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $koleksi->nama }}</td>
                    <td>{{ $koleksi->jenis['nama'] }}</td>
                    <td>{{ $koleksi->harga_beli }}</td>
                    <td>{{ $koleksi->penjual['nama'] }}</td>
                    <td>{{ $koleksi->tanggal_beli }}</td>
                    <td><img class="card-img-top" src="/assets/img/{{ $koleksi->foto }}" alt="" style="width:100px;height:100px;margin:5px"></td>
                    <td>{{ $koleksi->keterangan }}</td>
                    <td>
                        <form action="{{ route('koleksi.destroy', $koleksi->id) }}" method="POST">
                            {{-- <a class="btn btn-primary btn-action" href="{{ route('koleksi.show',$koleksi->id) }}"><i class="fa fa-eye"></i></a> --}}
                            <a class="btn btn-info btn-action" href="{{ route('koleksi.edit',$koleksi->id) }}"><i class="fa fa-pencil"></i></a>
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