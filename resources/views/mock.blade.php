<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSV Upload Test</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            margin: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="csv">
        <button type="submit">Upload</button>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jurusan</th>
            <th>Tanggal Lahir</th>
            <th>Username</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->umur }}</td>
            <td>{{ $user->jurusan }}</td>
            <td>{{ $user->tanggallahir }}</td>
            <td>{{ $user->username }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
