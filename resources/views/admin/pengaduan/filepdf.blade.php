@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF - Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Data Laporan Pengaduan</h1>
    <p>{{ Carbon::now()->toDateTimeString() }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Tanggal Pengaduan</th>
            <th>Isi Laporan</th>
            <th>foto</th>
            <th>Status</th>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->nama_pengadu }}</td>
            <td>{{ $item->tgl_pengaduan }}</td>
            <td>{{ $item->isi_laporan }}</td>
            <td>
                @if ($item->foto)
                <img src="{{ public_path("storage/".$item->foto) }}" height="75" width="75" alt="" />
                @endif    
            </td>
                @if ($item->status === 'tunggu')
                    <td> <button disabled style="color:white; background-color: red; padding:8px">{{ $item->status }}</button></td>
                @elseif($item->status === 'proses')
                    <td> <button disabled style="color:white; background-color: blue; padding:8px">{{ $item->status }}</button></td>
                @else
                    <td> <button disabled style="color:white; background-color: green; padding:8px">{{ $item->status }}</button></td>
                @endif
        </tr>
        @endforeach
    </table>
  
</body>
</html>