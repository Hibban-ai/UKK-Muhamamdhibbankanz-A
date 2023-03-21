@extends('_layouts.admin')
@section('page_title', 'Tanggapi Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('img/pengaduan/' . $data->foto) }}" class="rounded" width="100%" height="300px"
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
                            <form action="{{route('admin.create-tanggapan', $data->no_pengaduan)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggapan">Tanggapan Anda :</label>
                                    <textarea name="tanggapan" id="tanggapan" class="form-control" placeholder="Tanggapan anda" rows="8"></textarea>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-primary">Simpan</button>
                                    <a href="{{route('admin.pengaduan-undone')}}" class="float-end btn btn-primary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
