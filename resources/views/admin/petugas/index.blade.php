@extends('_layouts.admin')
@section('page_title', 'Petugas')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Petugas</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.petugas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama"
                                class="form-control @error('nama_petugas')
                            is-invalid
                            @enderror"
                                placeholder="Dimas" value="{{ old('nama_petugas') }}">
                            @error('nama_petugas')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}" id="username"
                                class="form-control @error('username')
                            is-invalid
                            @enderror"
                                placeholder="Dimas ws">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror"
                                placeholder="******">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="telp" name="telp" id="telp" value="{{ old('telp') }}"
                                class="form-control @error('telp')
                            is-invalid
                            @enderror"
                                placeholder="086765756765">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Petugas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="data-table">
                            <thead>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>No Telepon</th>
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
@section('js')
    <script>
        $(document).ready(function() {
            initiateDatatable()
        });

        function initiateDatatable() {
            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.petugas.get-petugas') }}',
                columns: [{
                        data: 'nama_petugas'
                    },
                    {
                        data: 'username'
                    },
                    {
                        data: 'telp'
                    },
                    {
                        data: 'action'
                    }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari Data",
                    lengthMenu: "Tampilkan _MENU_ baris",
                    zeroRecords: "Tidak ada data",
                    infoEmpty: "Menampilkan 0 - 0 (0 data)",
                    infoFiltered: "(Difilter dari _MAX_ total data)",
                    info: "Menampilkan _START_ - _END_ (_TOTAL_ data)",
                    paginate: {
                        previous: '<i class="bi bi-arrow-left"></i>',
                        next: '<i class="bi bi-arrow-right"></i>',
                    }
                },
            })
        }

        function deleteData(id) {
            var alert = confirm('Yakin dek?');
            if (alert) {
                var url = '{{ route('admin.petugas.destroy', ':id') }}';
                $.ajax({
                    type: 'delete',
                    url: url.replace(':id', id),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.statusCode == 200) {
                            $('#data-table').DataTable().ajax.reload()
                            Toastify({
                                text: response.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#60AF4B",
                            }).showToast()
                        } else {
                            Toastify({
                                text: response.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#B4000D",
                            }).showToast()
                        }
                    },error: function (error) {
                        console.log(error)
                    }
                })
            }
        }
    </script>
@endsection
