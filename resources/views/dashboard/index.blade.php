@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="panel-heading">
    <h3 class="panel-title">Dashboard</h3>

</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="metric">
                <span class="icon"><i class="fa fa-users"></i></span>
                <p>
                    <span class="number">{{ App\Penjual::count() }}</span>
                    <span class="title">Total Penjual</span>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="metric">
                <span class="icon"><i class="fa fa-line-chart"></i></span>
                <p>
                    <span class="number">{{ App\Jenis::count() }}</span>
                    <span class="title">Total Jenis</span>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="metric">
                <span class="icon"><i class="fa fa-credit-card"></i></span>
                <p>
                    <span class="number">{{ App\Koleksi::count() }}</span>
                    <span class="title">Total Koleksi</span>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="metric">
                <span class="icon"><i class="fa fa-calendar"></i></span>
                <p>
                    <span class="number">{{ App\Kejuaraan::count() }}</span>
                    <span class="title">Total Kejuaraan</span>
                </p>
            </div>
        </div>
    </div>
</div>


@endsection