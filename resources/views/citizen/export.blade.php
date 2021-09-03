<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>No HP</th>
            <th>Status Ekonomi</th>
            <th>RT</th>
            <th>RW</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    @foreach($citizens as $citizen)
        <tr>
            <td>{{ $citizen->name }}</td>
            <td>{{ "'" . $citizen->nik }}</td>
            <td>{{ $citizen->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $birthday = date('d M Y' , strtotime($citizen->birthday)) }}</td>
            <td>{{ $citizen->no_hp }}</td>
            <td>{{ Str::replace("_", " ", $citizen->status) }}</td>
            <td>{{ $citizen->rt }}</td>
            <td>{{ $citizen->rw }}</td>
            <td>{{ $citizen->address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
