@extends('layouts.adminBar')
@section('content')
<center><h4>Jadwal</h4></center>
<br>
<div class="container">
   <form action="{{route('tambah_jadwal')}}">
    <button type="submit">Tambah Jadwal</button>
   </form>
</div>
<br>
<br><br>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Waktu Berangkat</th>
        <th scope="col">Rute</th>
        <th scope="col">Kapal</th>
        <th scope="col">Supir</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($jadwals as $j)
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$j->waktu_berangkat}}</td>
            <td>{{$j->rute->lokasi_berangkat}} - {{$j->rute->lokasi_tujuan}}</td>
            <td>{{$j->kapal->nama}}</td>
            <td>{{$j->supir->name}}</td>
            <td>
              @php
                  $now = \Illuminate\Support\Carbon::now(new DateTimeZone('Asia/Jakarta'));
                  $now2 = strtotime($now);
                  $waktuBerangkat = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $j->waktu_berangkat);
                  $waktuBerangkat2 = strtotime($waktuBerangkat);
              @endphp
              @if ($now2 > $waktuBerangkat2)
                   <p style="color: red">Sudah Berangkat</p> {{-- | Now : {{ $now2 }} || Berangkat : {{ $waktuBerangkat2 }} --}}
              @else
                   <p style="color: blue">Belum berangkat</p> {{-- | Now : {{ $now2 }} || Berangkat : {{ $waktuBerangkat2 }} --}}
              @endif
          </td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('edit_jadwal', $j->id) }}" class="btn btn-warning">Edit</a>
                
                    {{-- <form action="{{ route('hapus_supir', $s->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form> --}}
                </div>
            </td>
          </tr>
          <?php $num++; ?>
        @endforeach
    </tbody>
  </table>
@endsection

