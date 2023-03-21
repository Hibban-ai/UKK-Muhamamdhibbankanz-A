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
                ajax: '{{ route('admin.get-done') }}',
                columns: [{
                        data: 'masyarakat.nama'
                    },
                    {
                        data: 'isi_laporan'
                    },
                    {
                        data: 'tgl_pengaduan'
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

        function responseAduan(no_pengaduan) {
            var url = '{{ route('admin.pengaduan-detail', ':id') }}';
            var url = url.replace(':id', no_pengaduan);
            window.location = url
        }
    </script>
@endsection
