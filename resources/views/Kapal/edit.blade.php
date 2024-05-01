@extends('layouts.adminBar')


@section('content')
<center><h1>Edit Kapal</h1></center>

<div class="container">
    <h5><a href="{{route('index_kapal')}}">Index Kapal</a></h5>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kapal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_kapal', $kapal) }}" enctype="multipart/form-data">
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
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{$kapal->nama}}"  required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">deskripsi</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control" name="deskripsi" required rows="5">{{$kapal->deskripsi}}</textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="kapasitas" class="col-md-4 col-form-label text-md-end">Kapasitas</label>
                            <div class="col-md-6">
                                <input id="kapasitas" type="number" class="form-control" name="kapasitas" value="{{$kapal->kapasitas}}"  required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">Current Image :</label>
                            <div class="col-md-6">
                                <img src="{{url('storage/Kapal_Image/'.$kapal->gambar)}}" alt="" height="200" width="200">
                                <br><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Pilih Gambar Baru</label>

                            <div class="col-md-6">
                                <input id="gambar" type="file" class="form-control" name="gambar" value="{{$kapal->gambar}}" >
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="available_booking" class="col-md-4 col-form-label text-md-end">Available Booking</label>
                            <div class="col-md-6">
                                <select name="available_booking" id="available_booking">
                                    <option value="1" {{ ($kapal->available_booking == 1) ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ ($kapal->available_booking == 0) ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="booking" class="col-md-4 col-form-label text-md-end">Booking</label>
                            <div class="col-md-6">
                                <select name="booking" id="booking">
                                    <option value="1" {{ ($kapal->booking == 1) ? 'selected' : '' }}>Sedang Di-booking</option>
                                    <option value="0" {{ ($kapal->booking == 0) ? 'selected' : '' }}>Free</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="aktif" class="col-md-4 col-form-label text-md-end">Status</label>
                            <div class="col-md-6">
                                <select name="aktif" id="aktif">
                                    <option value="1" {{ ($kapal->aktif == 1) ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ ($kapal->aktif == 0) ? 'selected' : '' }}>Tidak Aktif</option>
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
