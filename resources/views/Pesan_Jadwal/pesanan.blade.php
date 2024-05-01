<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @foreach($pesanans as $p)

        @php
        $now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
        $now2 = strtotime($now);
        $checkoutTime = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $p->ditambahkan_pada);
        $checkoutTime2 = strtotime($checkoutTime);

        $selisih = $now2 - $checkoutTime2;

        $hari = floor(($selisih / (60 * 60 * 24)));
        $jam = floor(($selisih % (60 * 60 * 24)) / (60 * 60));
        $menit = floor(($selisih % (60 * 60)) / (60));
        $detik = floor(($selisih % (60)));

        @endphp

        @if($menit < 10 && $jam < 1 && $hari < 1)
        <form action="{{route('pembayaran_jadwal', $p->id)}}" method="GET">
            <p>Pemesanan Token : {{$p->snap_token}}</p>
            <p>Ditambahkan pada waktu : {{$p->ditambahkan_pada}}</p>
            <p>Time  : {{$hari}} hari, {{$jam}} jam, {{$menit}} menit, {{$detik}} detik</p>
            <p>lewat</p>
            <button>Pembayaran</button>
        </form>
        @endif
        <br><br><br>
    @endforeach

</body>
</html>

{{-- @php
$now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
$now2 = strtotime($now);
$waktuBerangkat = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $j->waktu_berangkat);
$waktuBerangkat2 = strtotime($waktuBerangkat);
@endphp
@if ($now2 > $waktuBerangkat2) --}}