@extends('_layouts.admin')
@section('page_title', 'Masyarakat Tidak Terverifikasi')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Masyarakat Belum Terverifikasi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="data-table">
                            <thead>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Nomor telepon</th>
                                <th>Registrasi pada</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            </tbody>
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
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#60AF4B",
            }).showToast()
        })

        function initiateDatatable() {
            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                autoWidth: false,
                ordering: false,
                ajax: '{{ route('admin.get-unverif') }}',
                columns: [{
                        data: 'nik'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'telp'
                    },
                    {
                        data: 'created_at'
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

        function approveUser(id) {
            var url = '{{ route('admin.approve', ':id') }}';
            var url = url.replace(':id', id);
            $.ajax({
                type: 'put',
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
    </script>
@endsection
