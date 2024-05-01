<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>{{$jadwal->rute->lokasi_berangkat}} - {{$jadwal->rute->lokasi_tujuan}}</h1>

    @foreach($pemesananJadwal as $pj)
        <h5>{{$pj->id}}</h5>
            {{-- <ul>
                @foreach ($pj->detail_pesan_jadwal as $detail)
                    <li>{{$detail->muatan_id}}</li>
                @endforeach
            </ul> --}}
            <br><br>
    @endforeach

    <br><br>

    @foreach($transactions as $t)
        <p>{{$t['status_code']}}  @if(isset($t['transaction_status']))
            
            - {{$t['transaction_status']}}</p>

            @endif
    @endforeach

    <br><br>

    <h1>Stok Muatan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Muatan</th>
                <th>Stok Tersedia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokMuatan as $muatanId => $stok)
                @php
                    $muatan = \App\Models\Muatan::find($muatanId);
                @endphp
                <tr>
                    <td>{{ $muatan->nama }}</td>
                    <td>{{ $stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>