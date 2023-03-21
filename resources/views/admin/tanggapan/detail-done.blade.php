@extends('_layouts.admin')
@section('page_title', 'Tanggapan Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('img/pengaduan/' . $data->foto) }}" class="rounded" width="250px"
                                alt="tidak ada gambar">
                        </div>
                        <div class="col-md-7">
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Isi Laporan :</label>
                                <span><b>{{ $data->isi_laporan }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Tanggal Dibuat :</label>
                                <span><b>{{ date('d F Y', strtotime($data->tgl_pengaduan)) }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Tanggapan :</label>
                                <span><b>{{ $tanggapan->tanggapan }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Ditanggapi Oleh :</label>
                                <span><b>{{ $tanggapan->petugas->nama_petugas }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Ditanggapi Pada :</label>
                                <span><b>{{ date('d F Y', strtotime($tanggapan->tgl_tanggapan)) }}</b></span>
                            </div>
                            <div>
                                <a href="#" class="btn btn-danger">Export</a>
                            </div>

                            <a href="{{route('admin.pengaduan-done')}}" class="float-end btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
