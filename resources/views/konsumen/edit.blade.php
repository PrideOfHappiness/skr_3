<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')
    
    <section class="content"> 
        <form action = "{{route('konsumen.update', $konsumen->id)}}" method="post"> 
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_konsumen" class="form-label">Kode Konsumen</label>
                <input type="text" class="form-control" id="kode_konsumen" name="kode_konsumen" value ="{{ $konsumen->kode_konsumen }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value ="{{ $konsumen->nama }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Wilayah</label>
                <input type="text" class="form-control" id="wilayah" name="wilayah" value ="{{ $konsumen->wilayah_konsumen->nama_wilayah }}" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $konsumen->alamat }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $konsumen->kecamatan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $konsumen->no_ktp }}" readonly>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $konsumen->no_telp}}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    @include('template/footer')
</body>