<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Barang</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <section class="content"> 
        <form action={{ route('barang.store') }} method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
            </div>
            <div class="mb-3">
                <label for="warna_barang" class="form-label">Warna Sepeda Motor</label>
                <input type="text" class="form-control" id="warna_barang" name="warna_barang" placeholder="Warna Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="nama_foto" class="form-label">Foto Sepeda Motor</label>
                <input type="file" class="form-control" id="nama_foto" name="nama_foto" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>