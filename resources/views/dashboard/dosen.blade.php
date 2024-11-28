<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
</head>
<body>
    <h1>Dashboard Dosen</h1>
    <h2>Jadwal Aktivitas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Aktivitas</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $aktivitas)
                <tr>
                    <td>{{ $aktivitas->nama_aktivitas }}</td>
                    <td>{{ $aktivitas->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
