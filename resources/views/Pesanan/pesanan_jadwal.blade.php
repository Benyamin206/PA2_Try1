@extends('layouts.app')
@section('content')



<div class="container">
    <h2>Pesanan Saya : </h2>

    <br><br><br>
    {{-- @foreach ($pesanans as $p)
        <h1>{{$p->id}}</h1>
        <p>{{$p->status_pembayaran}}</p>
        <p>{{$p->total_harga}}</p>
        <br><br><br>
    @endforeach --}}

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($pesanans as $p)
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Rute : {{$p->jadwal->rute->lokasi_berangkat}} - {{$p->jadwal->rute->lokasi_tujuan}}</h4>
              <p class="card-title">{{$p->jadwal->waktu_berangkat}}</p>
              <h6 class="card-text">Total pembayaran : {{ 'Rp.' . number_format($p->total_harga, 0, ',', '.')}}</h6>
              
              
              @if($p->status_pembayaran == 'Paid' && $p->refund == 0)
              {{-- <h6 class="">STATUS PEMBAYARAN: <span class="text-success">{{strtoupper($p->status_pembayaran)}}</span></h6> --}}
              <a href="{{route('tiket', $p->id)}}" class="btn btn-primary">Lihat Tiket</a>
              <a href="#" class="btn btn-warning">Lakukan Refund</a>
              @elseif ($p->status_pembayaran == 'Paid' && $p->refund == 1)
              <h4 class="text-danger"><strong>Pesanan Telah Di-Refund</strong></h4>
              @endif

            </div>
          </div>
        </div>

        @endforeach
      </div>
      

</div>


@endsection
