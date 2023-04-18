<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Konsumen</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <section class="content"> 
        <form action={{ route('konsumen.store') }} method="post"> 
            @csrf
            <div class="mb-3">
                <label for="kode_konsumen" class="form-label">Kode Konsumen</label>
                <input type="text" class="form-control" id="kode_konsumen" name="kode_konsumen" placeholder="Kode Konsumen" required>
            </div>
            <div class="mb-3">
                <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" placeholder="Nama Konsumen" required>
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Wilayah</label>
                <select name="nama_dosen" id="nama_dosen" class="form-control select2-multiple">
                    <option value="">Silahkan pilih wilayah terlebih dahulu!</option>
                    @foreach($wilayah as $wyl)
                        <option value="{{$wyl->id}}"> {{ $wyl->wilayah }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor KTP" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
            </div>
        </form>
    </section>
    @include('template/footer')
</body>