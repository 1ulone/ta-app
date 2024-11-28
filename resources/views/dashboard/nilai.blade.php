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
            background-color: #f5f5f5;
        }

        header {
            background: linear-gradient(to right, #ff7a00, #ff4e00);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background-color: #fff;
            padding: 20px;
            width: 250px;
            border-right: 1px solid #ddd;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            color: #ff7a00;
            font-size: 24px;
            margin-bottom: 20px;
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
            color: white;
            font-weight: bold;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #ff7a00;
            color: white;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
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
            border: 1px solid #ddd;
        }

        table th {
            background-color: #ff7a00;
            color: white;
        }

        button, a {
            background-color: #ff4e00;
            color: white;
            border: none;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
        }

        button:hover, a:hover {
            background-color: #ff7a00;
        }

        form label {
            margin-top: 10px;
            font-weight: bold;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            width: 100%;
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
            <p style="color: green;">{{ session('success') }}</p>
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
