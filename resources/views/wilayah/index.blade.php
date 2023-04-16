<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Wilayah</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2">
            <a class="btn btn-success" href="{{ route('wilayah.create') }}"> Tambah Wilayah</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Kode Wilayah</th>
                <th>Wilayah</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @foreach ($data as $wilayah)
                <tr>
                    <td>{{ $wilayah->kode_wilayah }} </td>
                    <td>{{ $wilayah->nama_wilayah }} </td>
                    <td> 
                        <a class="badge bg-info" href="{{ route('wilayah.show', $wilayah->kode_wilayah)}}">Detail</span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('template/footer')
</body>