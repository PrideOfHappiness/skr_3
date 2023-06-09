<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Finance Konsumen</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarKaryawan')

    <section class="content"> 
        <br>
        <div class = "pull-right mb-2">
            <a class="btn btn-success" href="{{ route('finance.create') }}"> Tambah Data Finance Konsumen</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Konsumen</th>
                <th>Penanggung</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                @foreach ($dataFinance as $finance) 
                    <tr> 
                        <td> {{ $finance->id }} </td>
                        <td> {{ $finance->konsumen_finance->nama }} </td>
                        <td> {{ $finance->nama_penanggung }} </td>
                        <td> 
                            <a class="badge bg-info" href="{{ route('finance.show', $finance->id)}}">Detail</span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('template/footer')
</body>