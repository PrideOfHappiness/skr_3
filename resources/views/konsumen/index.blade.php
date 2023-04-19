<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Karyawan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2">
            <a class="btn btn-success" href="{{ route('konsumen.create') }}"> Tambah Konsumen</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Konsumen</th>
                <th>Kecamatan</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @foreach ($dataKonsumen as $kons)
                <tr>
                    <td>{{ $kons->id }} </td>
                    <td>{{ $kons->nama }} </td>
                    <td>{{ $kons->kecamatan }} </td>
                    <td> 
                        <form action = "{{ route('konsumen.destroy', $kons->id) }}" method="Post">
                            <a class="badge bg-info" href="{{ route('konsumen.show', $kons->id)}}">Detail Konsumen</span></a>
                            <a class="badge bg-warning" href="{{ route('konsumen.edit', $kons->id)}}">Edit Data</span></a>
                            @csrf
                                @method("DELETE")
                                <button type="submit" class="badge bg-danger"> Hapus Data </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    @include('template/footer')
</body>
