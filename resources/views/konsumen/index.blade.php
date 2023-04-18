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
                <th>Daerah</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @foreach ($data as $konsumen)
                <tr>
                    <td>{{ $konsumen->id }} </td>
                    <td>{{ $konsumen->nama_konsumen }} </td>
                    <td>{{ $konsumen->kecamatan }} </td>
                    <td>{{ $karyawan->kode_wilayah_konsumen->nama_wilayah }}
                    <td> 
                        <form action = "{{ route('konsumen.destroy', $konsumen->id) }}" method="Post">
                            <a class="badge bg-info" href="{{ route('konsumen.show', $konsumen->id)}}">Detail</span></a>
                            <a class="badge bg-warning" href="{{ route('konsumen.edit', $konsumen->id)}}">Edit</span></a>
                            @csrf
                                @method("DELETE")
                                <button type="submit" class="badge bg-danger"> Delete </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    @include('template/footer')
</body>
