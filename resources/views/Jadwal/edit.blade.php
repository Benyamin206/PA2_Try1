@extends('layouts.adminBar')

@section('content')
<center><h1>Edit Jadwal</h1></center>

<div class="container">
    <h5><a href="{{route('index_jadwal')}}">Index Jadwal</a></h5>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Jadwal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_jadwal', $jadwal->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
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
                            <label for="waktu_berangkat" class="col-md-4 col-form-label text-md-end">Current Waktu Berangkat</label>
                            <div class="col-md-6">
                                <?php
                                    $waktuBerangkat = \Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $jadwal->waktu_berangkat);
                                    $waktuBerangkat2 = strtotime($waktuBerangkat);
                                    ?>
                                {{$waktuBerangkat}}
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="waktu_berangkat" class="col-md-4 col-form-label text-md-end">Edit Waktu Berangkat</label>
                            <div class="col-md-6">
                                <input id="waktu_berangkat" type="datetime-local" class="form-control" name="waktu_berangkat" value="{{$jadwal->waktu}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rute_id" class="col-md-4 col-form-label text-md-end">Rute</label>
                            <div class="col-md-6">
                                <select name="rute_id" id="rute_id" class="form-control" value="{{ old('rute_id') }}" required>
                                    <option value="{{$jadwal->rute->id}}" selected>{{$jadwal->rute->lokasi_berangkat}} - {{$jadwal->rute->lokasi_tujuan}}</option>
                                    @foreach($rutes as $r)
                                        @if($r->id != $jadwal->rute->id)
                                        <option value="{{$r->id}}">{{$r->lokasi_berangkat}} - {{$r->lokasi_tujuan}}</option>
                                        @endif
                                    @endforeach
                                </select>                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kapal" class="col-md-4 col-form-label text-md-end">Kapal</label>
                            <div class="col-md-6">
                                <select name="kapal_id" id="kapal" class="form-control" value="{{ old('kapal') }}" required>
                                    <option value="{{$jadwal->kapal->id}}" selected>{{$jadwal->kapal->nama}}</option>
                                    @foreach($kapals as $k)
                                        @if($k->id != $jadwal->kapal->id)
                                        <option value="{{$k->id}}">{{$k->nama}}</option>
                                        @endif
                                    @endforeach
                                </select>                            
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="supir" class="col-md-4 col-form-label text-md-end">Nahkoda</label>
                            <div class="col-md-6">
                                <select name="supir_id" id="supir" class="form-control" value="{{ old('supir') }}" required>
                                    <option value="{{$jadwal->supir->id}}" selected>{{$jadwal->supir->name}}</option>
                                    @foreach($nahkodas as $n)
                                        @if($n->id != $jadwal->supir->id)
                                        <option value="{{$n->id}}">{{$n->name}}</option>
                                        @endif
                                    @endforeach
                                </select>                            
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
