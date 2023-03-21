@extends('_layouts.app')
@section('content')
    <div class="page-heading">
        <h3>Buat Pengaduan</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Pengaduan</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <form action="{{route('masyarakat.pengaduan.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="isi" class="mb-2">Isi Pengaduan:</label>
                                <textarea name="isi_laporan" id="isi" cols="30" rows="10" class="form-control @error('isi_laporan')
                                    is-invalid
                                @enderror"
                                    placeholder="isi pengaduan">{{old('isi_laporan')}}</textarea>
                                    @error('isi_laporan')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Bukti Pengaduan</label>
                                <input name="gambar" type="file" class="form-control @error('gambar')
                                is-invalid
                                @enderror">
                                @error('gambar')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Buat Pengaduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
