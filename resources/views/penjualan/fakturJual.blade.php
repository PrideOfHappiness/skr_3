<!DOCTYPE html>
<html>
<head>
	<title>Contoh Faktur Jual - Bisa direvisi lagi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <img src="{{ asset('style/dist/img/honda-logo-motorcycle-brand-png-16.png') }}">
		<h5>PT. Marga kartika Motor</h4>
		<h6>Jl. Hayam Wuruk no. 58 Tanggung, Wlingi, Blitar</h5>
	</center>
 
	<h3> Faktur Jual </h3>
	<h3> No. FJ/{{ $fj->nama_dealer}}/{{$fj->id}}</h3>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
				<th>Sepeda Motor</th>
				<th>Warna</th>
				<th>Tahun Rakit</th>
				<th>Nomor Mesin</th>
				<th>Nomor Rangka</th>
			</tr>
		</thead>
		<tbody>
            @php $i=1 @endphp
			@foreach($fj as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama_barang}}</td>
				<td>{{$p->warna_sepeda_motor}}</td>
				<td>{{$p->tahun_rakit}}</td>
				<td>{{$p->no_mesin}}</td>
				<td>{{$p->no_rangka}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>