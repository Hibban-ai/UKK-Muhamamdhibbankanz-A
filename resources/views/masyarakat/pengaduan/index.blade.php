@extends('_layouts.app')
@section('content')
    <div class="page-heading">
        <h3>Pengaduan</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Pengaduanku</h4>
                        <a href="{{ route('masyarakat.pengaduan.create') }}" class="btn btn-sm btn-primary">+ Buat
                            Pengaduan</a>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <span>Berdasarkan data yang kami kelola kamu telah membuat pengaduan sebanyak
                                {{ $pengaduan }}</span>
                        </div>
                        <div class="table table-responsive">
                            <table class="table" id="data-table">
                                <thead>
                                    <th>Pengaduan</th>
                                    <th>Dibuat tanggal</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            initiateDatatable();
        })

        function initiateDatatable() {
            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('masyarakat.get-pengaduan') }}',
                columns: [{
                        data: 'isi_laporan'
                    },
                    {
                        data: 'tgl_pengaduan'
                    },
                    {
                        data: 'foto'
                    },
                    {
                        data: 'status'
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
                        next: "<i class='bi bi-arrow-right'></i>",
                    }
                },
            })
        }

        function responseAduan(id) {
            var url = '{{ route('masyarakat.pengaduan.tanggapan.detail', ':id') }}';
            window.location = url.replace(':id', id);
        }

        function deleteAduan(id) {
            var url = '{{ route('masyarakat.pengaduan.destroy', ':id') }}';
            var url = url.replace(':id', id);
            var alert = confirm('Yakin dek?');
            if (alert) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    cache: false,
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
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })
            }
        }
    </script>
@endsection
