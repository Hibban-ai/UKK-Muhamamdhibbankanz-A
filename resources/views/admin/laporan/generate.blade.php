@extends('_layouts.admin')
@section('page_title', 'Pengaduan Ditanggapi')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Pengaduan</h5>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table" id="data-table">
                            <thead>
                                <th>Nama</th>
                                <th>Isi Pengaduan</th>
                                <th>Dibuat tanggal</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection