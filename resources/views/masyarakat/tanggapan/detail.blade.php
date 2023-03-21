@extends('_layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Detail tanggapan</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-12 d-flex justify-content-center mb-3">
                            <img src="{{asset('img/pengaduan/' .$data->foto)}}" alt="tidak ada gambar" width="80%" height="500px">
                        </div>
                        <div class="col-sm-5 p-5">
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Isi Laporan :</label>
                                <span><b>{{ $data->isi_laporan }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Tanggal Dibuat :</label>
                                <span><b>{{ date('d F Y', strtotime($data->tgl_pengaduan)) }}</b></span>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="isi">Status :</label>
                                <span class="badge bg-success">{{ ucfirst($data->status) }}</span>
                            </div>
                        </div>
                        <div class="col-sm-5 p-5">
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
                            <a href="{{route('masyarakat.pengaduan.index')}}" class="float-end btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
