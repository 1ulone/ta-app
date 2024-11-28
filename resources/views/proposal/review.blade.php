<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Proposal</title>
</head>
<body>
    <h1>Review Proposal</h1>
    <h2>{{ $proposal->judul }}</h2>
    <p>Mahasiswa: {{ $proposal->mahasiswa->name }}</p>
    <p><a href="{{ asset('storage/' . $proposal->file_proposal) }}" target="_blank">Download Proposal</a></p>
</body>
</html>
