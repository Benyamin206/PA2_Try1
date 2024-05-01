<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Stok Muatan</title>
</head>
<body>
    <h1>Detail Stok Muatan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Muatan</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stokMuatan as $muatanId => $sisaStok)
            <tr>
                <td>{{ $muatanId }}</td>
                <td>{{ $sisaStok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
