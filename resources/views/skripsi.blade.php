<!DOCTYPE html>
<html>
<head>
    <title>Daftar Skripsi</title>
</head>
<body>
    <h1>Daftar Skripsi</h1>
    <table>
        <tr>
            <th>Judul</th>
            <th>nama</th>
            <th>nim</th>
            <th>angkatan</th>
            <th>dosen_pembimbing1</th>
            <th>dosesn_pembimbing2</th>
        </tr>
        @foreach ($skripsis as $data)
        <tr>
            <td>{{ $data->judul }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nim }}</td>
            <td>{{ $data->angkatan }}</td>
            <td>{{ $data->dosen_pembimbing1 }}</td>
            <td>{{ $data->dosen_pembimbing2 }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
