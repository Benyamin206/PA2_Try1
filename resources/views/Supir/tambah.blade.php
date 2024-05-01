@extends('layouts.bootstrap')

@section('content')
<center><h1>Tambah Nahkoda</h1></center>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Nahkoda</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_supir') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nomor_hp" class="col-md-4 col-form-label text-md-end">Nomor HP</label>

                            <div class="col-md-6">
                                <input id="nomor_hp" type="text" class="form-control" name="nomor_hp" value="{{old('nomor_hp')}}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin') }}" required>
                                    <option value="" disabled selected>----- Pilih Jenis Kelamin -----</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                
                                <script>
                                    window.addEventListener('DOMContentLoaded', (event) => {
                                        const selectElement = document.getElementById('jenis_kelamin');
                                        const disabledOptions = Array.from(selectElement.querySelectorAll('option[disabled]'));
                                
                                        // Move disabled options to the top
                                        disabledOptions.forEach((option) => {
                                            selectElement.insertBefore(option, selectElement.firstChild);
                                        });
                                    });
                                </script>
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat</label>

                            <div class="col-md-6">
                                {{-- <input id="alamat" type="text" class="form-control" name="alamat" value="{{old('alamat')}}" required> --}}
                                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" value="{{old('alamat')}}" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Tambah Nahkoda
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
