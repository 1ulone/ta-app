<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Proposal</title>
</head>
<body>
    <h1>Form Upload Proposal</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('proposal.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="judul">Judul Proposal:</label>
        <input type="text" id="judul" name="judul" required>
        <br>
        <label for="file_proposal">File Proposal (PDF):</label>
        <input type="file" id="file_proposal" name="file_proposal" required>
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
