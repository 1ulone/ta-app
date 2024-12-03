<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #e0e0e0;
        }

        header {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            padding: 20px;
            text-align: center;
            text-shadow: 0 0 10px cyan;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background-color: #1c1c1c;
            padding: 20px;
            width: 250px;
            border-right: 1px solid #333;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar h2 {
            color: #00ffff;
            font-size: 24px;
            margin-bottom: 20px;
            text-shadow: 0 0 8px cyan;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #00ffff;
            font-weight: bold;
            display: block;
            padding: 10px;
            border-radius: 5px;
            background: rgba(0, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #00ffff;
            color: #121212;
            text-shadow: 0 0 10px cyan;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #121212;
        }

        .form-container, .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #333;
        }

        table th {
            background-color: #0f2027;
            color: white;
            text-shadow: 0 0 5px cyan;
        }

        table td {
            background-color: #1c1c1c;
        }

        button, a {
            background-color: #00ffff;
            color: #121212;
            border: none;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease;
            box-shadow: 0 0 5px cyan;
        }

        button:hover, a:hover {
            background-color: #00b3b3;
            box-shadow: 0 0 10px cyan;
        }

        form label {
            margin-top: 10px;
            font-weight: bold;
            color: #00ffff;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #1c1c1c;
            color: #e0e0e0;
        }

        form input:focus, form select:focus, form textarea:focus {
            outline: none;
            border-color: #00ffff;
            box-shadow: 0 0 10px cyan;
        }

        form button {
            width: 100%;
        }

        h3 {
            color: #00ffff;
            text-shadow: 0 0 10px cyan;
        }

        .table-container h3, .form-container h3 {
            text-shadow: 0 0 8px cyan;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard Nilai</h1>
</header>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Jadwal</a></li>
            <li><a href="#">Penguji</a></li>
            <li><a href="#">Nilai</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Menampilkan Pesan Sukses -->
        @if (session('success'))
            <p style="color: lime;">{{ session('success') }}</p>
        @endif

        <!-- Form tambah nilai -->
        <div class="form-container">
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
                </select>

                <label for="jadwal_id">Jadwal:</label>
                <select name="jadwal_id" id="jadwal_id" required>
                    @foreach($jadwal as $j)
                        <option value="{{ $j->id }}">{{ $j->name }}</option>
                    @endforeach
                </select>

                <label for="penguji_id">Penguji:</label>
                <select name="penguji_id" id="penguji_id" required>
                    @foreach($penguji as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>

                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" min="0" max="100" required>

                <label for="catatan">Catatan:</label>
                <textarea name="catatan"></textarea>

                <button type="submit">Simpan Nilai</button>
            </form>
        </div>

        <!-- Data Nilai -->
        <div class="table-container">
            <h3>Data Nilai</h3>
            <table>
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
        </div>
    </div>
</div>

</body>
</html>
