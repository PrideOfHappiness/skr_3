<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Barang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2">
            <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah Data Barang</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @foreach ($dataBarang as $barang)
                    <tr> 
                        <td> {{ $barang->id }}</td>
                        <td> {{ $barang->kode_barang }}</td>
                        <td> {{ $barang->nama_barang }}</td>
                        <td> 
                            <a class="badge bg-info" href="{{ route('barang.show', $barang->id)}}">Detail</span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $dataBarang->links() !!}
    </section>
    @include('template/footer')
</body>
</html>