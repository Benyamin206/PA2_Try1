@extends('layouts.adminBar')

@section('content')
<center><h1>Tambah Muatan</h1></center>

<div class="container">
    <h5><a href="{{route('index_muatan')}}">Index Muatan</a></h5>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Muatan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_muatan') }}">
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
                            <label for="harga_per_item" class="col-md-4 col-form-label text-md-end">Harga Per Item (Rupiah)</label>
                            <div class="col-md-6">
                                <input id="harga_per_item" type="number" class="form-control" name="harga_per_item" value="{{old('harga_per_item')}}" min="500" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="maksimal" class="col-md-4 col-form-label text-md-end">Maksimal</label>

                            <div class="col-md-6">
                                <input id="maksimal" type="number" class="form-control" name="maksimal" value="{{old('maksimal')}}" min="1" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Muatan
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
