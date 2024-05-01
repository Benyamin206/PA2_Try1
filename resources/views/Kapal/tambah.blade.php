@extends('layouts.adminBar')

@section('content')
<center><h1>Tambah Kapal</h1></center>

<div class="container">
    <h5><a href="{{route('index_kapal')}}">Index Kapal</a></h5>
</div>
{{-- <p>s</p> --}}
{{-- <img src="{{url('public/image/kapal1SeederImage.jpg')}}" alt="" height="100" width="100"> --}}
{{-- <h1>{{Auth::user()->id}}</h1> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kapal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_kapal') }}" enctype="multipart/form-data">
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
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{old('nama')}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">Deskripsi</label>
                            <div class="col-md-6">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" value = "{{old('deskripsi')}}" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kapasitas" class="col-md-4 col-form-label text-md-end">Kapasitas</label>
                            <div class="col-md-6">
                                <input id="kapasitas" type="number" min="1" class="form-control" name="kapasitas" value="{{old('kapasitas')}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">Gambar</label>
                            <div class="col-md-6">
                                <input id="gambar" type="file" class="form-control" name="gambar" value="{{old('gambar')}}" required>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Kapal
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
