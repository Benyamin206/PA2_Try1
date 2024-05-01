@extends('layouts.adminBar')


@section('content')
<center><h1>Tambah Jadwal</h1></center>
<style>
    input:disabled {
        background-color: #ccc;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container">
    <h5><a href="{{route('index_jadwal')}}">Index Jadwal</a></h5>
</div>
{{-- <p>s</p> --}}
{{-- <img src="{{url('public/image/kapal1SeederImage.jpg')}}" alt="" height="100" width="100"> --}}
{{-- <h1>{{Auth::user()->id}}</h1> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Jadwal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_jadwal') }}" enctype="multipart/form-data">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="waktu_berangkat" class="col-md-4 col-form-label text-md-end">Waktu Berangkat</label>
                            <div class="col-md-6">
                                {{-- <input id="waktu_berangkat" type="datetime-local" class="form-control" name="waktu_berangkat" value="{{old('waktu_berangkat')}}" required> --}}
                                <input id="waktu_berangkat" type="text" class="form-control" name="waktu_berangkat" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rute" class="col-md-4 col-form-label text-md-end">Rute</label>
                            <div class="col-md-6">
                                <select name="rute_id" id="rute" class="form-control" value="{{ old('rute') }}" required>
                                    <option value="" disabled selected>----- Pilih Rute -----</option>
                                    @foreach($rutes as $r)
                                        <option value="{{$r->id}}">{{$r->lokasi_berangkat}} - {{$r->lokasi_tujuan}}</option>
                                    @endforeach
                                </select>                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kapal" class="col-md-4 col-form-label text-md-end">Kapal</label>
                            <div class="col-md-6">
                                <select name="kapal_id" id="kapal" class="form-control" value="{{ old('kapal') }}" required>
                                    <option value="" disabled selected>----- Pilih kapal -----</option>
                                    @foreach($kapals as $k)
                                        <option value="{{$k->id}}">{{$k->nama}}s</option>
                                    @endforeach
                                </select>                            
                            </div>x
                        </div>

                        <div class="row mb-3">
                            <label for="nahkoda" class="col-md-4 col-form-label text-md-end">Nahkoda</label>
                            <div class="col-md-6">
                                <select name="supir_id" id="nahkoda" class="form-control" value="{{ old('nahkoda') }}" required>
                                    <option value="" disabled selected>----- Pilih Nahkoda -----</option>
                                    @foreach($nahkodas as $n)
                                        <option value="{{$n->id}}">{{$n->name}}</option>
                                    @endforeach
                                </select>                            
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Jadwal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#waktu_berangkat', {
        enableTime: true,
        minDate: 'today', // Memastikan hanya waktu yang saat ini atau di masa depan yang dapat dipilih
        dateFormat: 'Y-m-d H:i', // Format tanggal dan waktu
        time_24hr: true, // Format waktu dalam 24 jam
    });
</script>


@endsection
