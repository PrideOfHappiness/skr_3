<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Penjualan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <form action={{ route('penjualan.store') }} method="post" enctype="multipart/form-data"> 
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
            <div class="mb-3">
                <label for="kode_wilayah_konsumen" class="form-label">Wilayah</label>
                <select name="kode_wilayah_konsumen" id="kode_wilayah_konsumen">
                    <option value=""> Silahkan Pilih Wilayah terlebih dahulu! </option>
                    @foreach($wilayah as $wil)
                        <option value="{{ $wil->id }}"> {{ $wil->wilayah }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="no_ktp_konsumen" class="form-label">Nomor KTP Konsumen</label>
                <input type="text" class="form-control" id="no_ktp_konsumen" name="no_ktp_konsumen" placeholder="Nomor KTP Konsumen" required>
            </div>
            <div class="mb-3">
                <label for="foto_ktp_konsumen" class="form-label">Foto KTP Konsumen</label>
                <input type="file" class="form-control" id="foto_ktp_konsumen" name="foto_ktp_konsumen" placeholder="Foto KTP Konsumen" required>
            </div>
            <div class="mb-3">
                <label for="no_telp_konsumen" class="form-label">Nomor Telepon Konsumen</label>
                <input type="text" class="form-control" id="no_telp_konsumen" name="no_telp_konsumen" placeholder="Nomor Telepon Konsumen" required>
            </div>
            <h3> Data Sepeda Motor Terjual </h3>
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
                <label for="kode_gudang_barang" class="form-label">Gudang</label>
                <select name="kode_gudang_barang" id="kode_gudang_barang">
                    <option value=""> Silahkan Pilih Gudang terlebih dahulu! </option>
                    @foreach($gudang as $gdg)
                        <option value="{{ $gdg->id }}"> {{ $gdg->gudang }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="warna_barang" class="form-label">Warna Sepeda Motor</label>
                <input type="text" class="form-control" id="warna_barang" name="warna_barang" placeholder="Warna Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="tahun_rakit_barang" class="form-label">Tahun Rakit Sepeda Motor</label>
                <input type="text" class="form-control" id="tahun_rakit_barang" name="tahun_rakit_barang" placeholder="Tahun Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="no_rangka_barang" class="form-label">Nomor Rangka Sepeda Motor</label>
                <input type="text" class="form-control" id="no_rangka_barang" name="no_rangka_barang" placeholder="Nomor Rangka Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="no_mesin_barang" class="form-label">Nomor Mesin Sepeda Motor</label>
                <input type="text" class="form-control" id="no_mesin_barang" name="no_mesin_barang" placeholder="Nomor Mesin Sepeda Motor" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang_terjual" class="form-label">Harga Terjual</label>
                <input type="text" class="form-control" id="harga_barang_terjual" name="harga_barang_terjual" placeholder="Harga Terjual" required>
            </div>
            <div class="mb-3">
                <label for="jenis_bayar_barang" class="form-label">Metode Pembayaran</label>
                <select name="jenis_bayar_barang" id="jenis_bayar_barang">
                    <option value=""> Silahkan Pilih Metode Pembayaran terlebih dahulu! </option>
                    <option value="Tunai"> Tunai / Cash </option>
                    <option value="Kredit Dealer"> Kredit Dealer </option>
                    <option value="kredit Leasing"> Kredit Leasing </option>
                </select>
            </div>
            <h3> Data Karyawan & Dealer </h3>
            <div class="mb-3">
                <label for="kode_karyawan" class="form-label">Karyawan</label>
                <select name="kode_karyawan" id="kode_karyawan">
                    <option value=""> Silahkan Pilih Karyawan terlebih dahulu! </option>
                    @foreach($karyawan as $kry)
                        <option value="{{ $kry->id }}"> {{ $kry->karyawan }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Sales</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Sales" required>
            </div>
            <div class="mb-3">
                <label for="nama_dealer" class="form-label">Dealer</label>
                <select name="nama_dealer" id="nama_dealer">
                    <option value=""> Silahkan Pilih Karyawan terlebih dahulu! </option>
                    <option value="MKM"> Marga Kartika Motor </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>
</html>

