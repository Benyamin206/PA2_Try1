@extends('layouts.PesanJadwal.index')

@section('content')
    <a href="/home">Dashboard</a>
    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- <h2>Form Pemesanan Jadwal </h2>
    <h5>Rute : {{$jadwal->rute->lokasi_berangkat}} - {{$jadwal->rute->lokasi_tujuan}}</h5>
    <br><br><br> --}}


    

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
{{-- 
    <form action="{{ route('checkout_jadwal') }}" method="post">
        @csrf
        @foreach($muatans as $muatan)
        <div class="mb-3">
            <!-- Tampilkan keterangan stok -->
            <p>Stok Tersedia: {{ $stokMuatan[$muatan->id] }}</p>
            <label for="muatan_{{ $muatan->id }}" class="form-label">Jumlah {{ $muatan->nama }}</label>
            <!-- Gunakan old() untuk mempertahankan nilai input jika terjadi kesalahan validasi -->
            <input type="number" name="muatan[{{ $muatan->id }}]" class="form-control" id="muatan_{{ $muatan->id }}" placeholder="Jumlah {{ $muatan->nama }}" value="{{ old('muatan.' . $muatan->id, 0) }}">
            <!-- Jika terjadi kesalahan, tampilkan pesan kesalahan untuk input ini -->
            @error('muatan.' . $muatan->id)
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br><br>
        @endforeach
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
        <p>{{$jadwal->id}}</p>
        <button type="submit" class="btn btn-primary">CheckOut</button>
    </form> --}}
    

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Form Pemesanan Jadwal</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-4">Rute: {{$jadwal->rute->lokasi_berangkat}} - {{$jadwal->rute->lokasi_tujuan}}</h5>
                        <form action="{{ route('checkout_jadwal') }}" method="post">
                            @csrf
                            @foreach($muatans as $muatan)
                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <label for="muatan_{{ $muatan->id }}" class="form-label"><b> {{ $muatan->nama }} : </b></label>
                                    <input type="number" name="muatan[{{ $muatan->id }}]" class="form-control" id="muatan_{{ $muatan->id }}" placeholder="Jumlah {{ $muatan->nama }}" value="{{ old('muatan.' . $muatan->id, 0) }}">
                                    @error('muatan.' . $muatan->id)
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <p class="mt-2" style="color: red"><b>Stok Tersedia: {{ $stokMuatan[$muatan->id] }}</b></p>
                                </div>
                            </div>
                            @endforeach
                            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">CheckOut</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

@endsection
