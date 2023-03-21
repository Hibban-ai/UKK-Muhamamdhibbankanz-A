@extends('_layouts.admin')
@section('page_title', 'Pengaduan Ditanggapi')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Generate Data</h5>
                </div>
                
           <div class="form-group row">
            <label for="date" class="col-form-label col-sm-2">Form</label>
            <div class="col-sm-3">
                <input type="date" class="form-contol input-sm" id="fromdate" name="date">
            </div>
            <div class="form-group row">
                <label for="date" class="col-form-label col-sm-2">To</label>
                <div class="col-sm-3">
                    <input type="date" class="form-contol input-sm" id="todate" name="date">
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            
           

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