<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
</head>
<body>

    <h1>Data Nilai</h1>

    <!-- Menampilkan Pesan Sukses -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Form tambah nilai -->
    <h3>Tambah Nilai</h3>
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <label for="mahasiswa_id">Mahasiswa:</label>
        <select name="mahasiswa_id" id="mahasiswa_id" required>
            @foreach($mahasiswa as $m)
                <option value="{{ $m->id }}">
                    {{ $m->NIM ?? 'ID: ' . $m->id }}
                </option>
            @endforeach
        </select><br><br>

        <label for="jadwal_id">Jadwal:</label>
        <select name="jadwal_id" id="jadwal_id" required>
            @foreach($jadwal as $j)
                <option value="{{ $j->id }}">{{ $j->name }}</option>
            @endforeach
        </select><br><br>

        <label for="penguji_id">Penguji:</label>
        <select name="penguji_id" id="penguji_id" required>
            @foreach($penguji as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select><br><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" min="0" max="100" required><br><br>

        <label for="catatan">Catatan:</label>
        <textarea name="catatan"></textarea><br><br>

        <button type="submit">Simpan Nilai</button>
    </form>

    <h3>Data Nilai</h3>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Jadwal</th>
                <th>Penguji</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $n)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $n->mahasiswa->NIM ?? 'Mahasiswa ID: ' . $n->mahasiswa->id }}</td>
                    <td>{{ $n->jadwal->name }}</td>
                    <td>{{ $n->penguji->name }}</td>
                    <td>{{ $n->jumlah }}</td>
                    <td>{{ $n->catatan }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $n->id) }}">Edit</a> |
                        <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
