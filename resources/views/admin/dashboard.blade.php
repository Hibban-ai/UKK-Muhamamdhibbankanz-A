@extends('_layouts.admin')
@section('page_title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3>Halo {{$me->nama_petugas}}</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Registrasi Masyarakat</b>
                </div>
                <div class="card-body">{{$total_user}}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Masyarakat Terverifikasi</b>
                </div>
                <div class="card-body">{{$user_verif}}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Masyarakat Belum Terverifikasi</b>
                </div>
                <div class="card-body">{{$user_unverif}}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Pengaduan</b>
                </div>
                <div class="card-body">{{$total_pengaduan}}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Pengaduan Ditanggapi</b>
                </div>
                <div class="card-body">{{$tanggap}}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <b>Total Pengaduan Belum Ditanggapi</b>
                </div>
                <div class="card-body">{{$belum_tanggap}}</div>
            </div>
        </div>
    </div>
@endsection
