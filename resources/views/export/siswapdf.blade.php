<html>
<head>
	<style type="text/css">
		/* Table */
		body {
			font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.demo-table th,
		.demo-table td {
			padding: 7px 17px;
		}
		.demo-table .title {
			caption-side: bottom;
			margin-top: 12px;
		}
		.demo-table thead th:last-child,
		.demo-table tfoot th:last-child,
		.demo-table tbody td:last-child {
			border: 0;
		}

		/* Table Header */
		.demo-table thead th {
			border-right: 1px solid #c7ecc7;
			text-transform: uppercase;
		}

		/* Table Body */
		.demo-table tbody td {
			color: #353535;
			border-right: 1px solid #c7ecc7;
		}
		.demo-table tbody tr:nth-child(odd) td {
			background-color: #f4fff7;
		}
		.demo-table tbody tr:nth-child(even) td {
			background-color: #dbffe5;
		}
		.demo-table tbody td:nth-child(4),
		.demo-table tbody td:first-child,
		.demo-table tbody td:last-child {
			text-align: right;
		}
		.demo-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
			transition: all .2s;
		}
	</style>
</head>
<body>
	<table class="demo-table">
		<caption class="title">Tabel Data Profile Seluruh Siswa</caption>
		<thead>
			<tr>
				<th>Nis</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Agama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Nilai Rata-rata</th>
			</tr>
		</thead>
		<tbody>
            @foreach($siswa as $s)
			<tr>
				<td>{{$s->nis}}</td>
				<td>{{$s->nama}}</td>
				<td>{{$s->tanggal_lahir->format('d-m-Y')}}</td>
				<td>{{$s->agama}}</td>
				<td>{{$s->jenis_kelamin}}</td>
				<td>{{$s->alamat}}</td>
				<td>{{$s->test()}}</td>
            </tr>
            @endforeach
		</tbody>
	</table>
</body>
</html>
