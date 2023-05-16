<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Pengiriman</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <form action={{ route('pengiriman.store') }} method="post" enctype="multipart/form-data"> 
            @csrf
            <h3> Data Konsumen </h3>
            <div class="mb-3">
                <label for="kode_konsumen" class="form-label">Konsumen</label>
                <select name="kode_konsumen" id="kode_konsumen">
                    <option value=""> Silahkan Pilih Konsumen terlebih dahulu! </option>
                    @foreach($konsumen as $kons)
                        <option value="{{ $kons->id }}"> {{ $kons->konsumen }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" placeholder="Nama Konsumen" required>
            </div>
            <div class="mb-3">
                <label for="alamat_konsumen" class="form-label">Alamat Konsumen</label>
                <input type="text" class="form-control" id="alamat_konsumen" name="alamat_konsumen" placeholder="Alamat Konsumen" required>
            </div>
            <h3> Data Sepeda Motor </h3>
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Sepeda Motor</label>
                <select name="kode_barang" id="kode_barang">
                    <option value=""> Silahkan Pilih Sepeda Motor terlebih dahulu! </option>
                    @foreach($barang as $brg)
                        <option value="{{ $brg->id }}"> {{ $brg->barang }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Sepeda Motor</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="no_rangka_barang" class="form-label">Nomor Rangka Sepeda Motor</label>
                <input type="text" class="form-control" id="no_rangka_barang" name="no_rangka_barang" placeholder="Nomor Rangka Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="no_mesin_barang" class="form-label">Nomor Mesin Sepeda Motor</label>
                <input type="text" class="form-control" id="no_mesin_barang" name="no_mesin_barang" placeholder="Nomor Mesin Sepeda Motor" required>
            </div>
            <h3> Status pengiriman </h3>
            <div class="mb-3">
                <label for="status" class="form-label">Status Pengiriman</label>
                <select name="status" id="status">
                    <option value=""> Silahkan Pilih Status Pengiriman terlebih dahulu! </option>
                    <option value="PDI"> Inspeksi Sebelum Pengiriman (PDI) </option>
                    <option value="Siap Kirim"> Sepeda Motor Dipersiapkan untuk dikirim </option>
                    <option value="Pengiriman"> Sepeda Motor Sedang Dikirim </option>
                </select>
            </div>
            <h3> Data Pengirim </h3>
            <div class="mb-3">
                <label for="kode_karyawan" class="form-label">Karyawan Pengirim</label>
                <select name="kode_karyawan" id="kode_karyawan">
                    <option value=""> Silahkan Pilih Karyawan terlebih dahulu! </option>
                    @foreach($karyawan as $kry)
                        <option value="{{ $kry->id }}"> {{ $kry->karyawan }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Sales" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>
</html>