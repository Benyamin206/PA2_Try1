@extends('layouts.PesanJadwal.index')

@section('content')
    <a href="/home">Dashboard</a>
    <br><br>

    <h2>Form Pemesanan Jadwal </h2>
    <h5>Rute : {{$jadwal->rute->lokasi_berangkat}} - {{$jadwal->rute->lokasi_tujuan}}</h5>
    <br><br><br>


    

    {{-- <form action="" method="post">
        @csrf
        @foreach($muatans as $m)
        <div class="mb-3">
            <label for="formGroupExampleInput{{$m->id}}" class="form-label">Jumlah {{$m->nama}}</label>
            <input type="number"  class="form-control" id="formGroupExampleInput{{$m->id}}" placeholder="Example input placeholder">
        </div>
        <br>
        @endforeach
        <input type="hidden" name="jadwal_id" id="" value="{{$jadwal->id}}">
        <button type="submit" class="btn btn-primary">CheckOut</button>
    </form> --}}

    <form action="{{ route('checkout_jadwal') }}" method="post">
        @csrf
        @foreach($muatans as $muatan)
        <div class="mb-3">
            <label for="muatan_{{ $muatan->id }}" class="form-label">Jumlah {{ $muatan->nama }}</label>
            <!-- Gunakan old() untuk mempertahankan nilai input jika terjadi kesalahan validasi -->
            <input type="number" name="muatan[{{ $muatan->id }}]" class="form-control" id="muatan_{{ $muatan->id }}" placeholder="Jumlah {{ $muatan->nama }}" value="{{ old('muatan.' . $muatan->id, 0) }}">
            <!-- Jika terjadi kesalahan, tampilkan pesan kesalahan untuk input ini -->
            @error('muatan.' . $muatan->id)
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        @endforeach
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
        <p>{{$jadwal->id}}</p>
        <button type="submit" class="btn btn-primary">CheckOut</button>
    </form>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    



@endsection
