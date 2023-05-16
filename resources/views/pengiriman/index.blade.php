<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Pengiriman</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2">
            <a class="btn btn-success" href="{{ route('pengiriman.create') }}"> Buat Pengiriman</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Konsumen</th>
                    <th>Sepeda Motor</th>
                    <th>Pengirim</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>  
                @foreach ($dataPenjualan as $penjualan)
                <tr>
                    <td>{{ $penjualan->id }} </td>
                    <td>{{ $penjualan->nama_penerima }} </td>
                    <td>{{ $penjualan->nama_barang }} </td>
                    <td>{{ $penjualan->nama_pengirim }} </td>
                    <th>{{ $penjualan->created_at }}
                    <td> 
                        <a class="badge bg-info" href="{{ route('penjualan.show', $penjualan->id)}}">Detail Penjualan</span></a>
                        <a class="badge bg-warning" href="{{url('penjualan/download')}}">Download FJ</span></a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </section>

    @include('template/footer')
</body>