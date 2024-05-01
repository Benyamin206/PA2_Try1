@extends('layouts.PesanJadwal.index')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('content')
    <a href="/home">Dashboard</a>
    <br><br>

    <h2>Pesan Jadwal Tersedia</h2>
    <br><br>

    <h5>Filter berdasarkan tanggals : </h5>
    <form action="{{route('filter_jadwal')}}" method="post">
        @csrf
        <input type="date" name="date" id="date" required>
        <button type="submit" class="btn btn-primary">cari</button>
    </form>
        <h3>Atau</h3>
    
    <a class="btn btn-info" href="/jadwal/index_pesan">Tampilkan Semua Jadwal</a>
    <br><br><br>

    
    @if(empty($jadwals))
       <center> <h1>Jadwal Tidak Ditemukan</h1></center>
    @else
    @foreach($jadwals as $j)
    <div class="card">
            <h5 class="card-header">{{$j->rute->lokasi_berangkat}} - {{$j->rute->lokasi_tujuan}}</h5>
            <div class="card-body">
            <h5 class="card-title">{{$j->waktu_berangkat}}</h5>
            <h6 class="card-text">Kapal : {{$j->kapal->nama}}</h6>
            <h6 class="card-text">Nahkoda : {{$j->supir->name}}</h6>
            <form action="{{route('detail_jadwal', $j->id)}}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Lakukan Pemesanan</button>
            </form>
            
        </div>
    </div>
    <br><br><br>
@endforeach
    @endif




    <script>
        window.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan elemen input tanggal
            var dateInput = document.getElementById('date');
    
            // Mendapatkan tanggal saat ini
            var today = new Date();
            var todayISO = today.toISOString().split('T')[0]; // Format tanggal dalam ISO (YYYY-MM-DD)
    
            // Mengatur nilai minimum input tanggal ke tanggal hari ini
            dateInput.min = todayISO;
        });
    </script>




@endsection
