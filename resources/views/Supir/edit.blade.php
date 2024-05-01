@extends('layouts.bootstrap')

@section('content')
    <center><h3>Edit Nahkoda</h3></center>
    <br>
    <div class="container">
        <h5><a href="{{route('index_supir')}}">Menu Nahkoda</a></h5>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Nahkoda</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('update_supir',$supir->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$supir->name}}" required autocomplete="name" autofocus>
    
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
                                    <input id="nomor_hp" type="text" class="form-control" name="nomor_hp" value="{{$supir->nomor_hp}}" required>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">Jenis Kelamin</label>
    
                                <div class="col-md-6">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"  required>
                                        <option value="{{$supir->jenis_kelamin}}">{{$supir->jenis_kelamin}}</option>
                                        @if($supir->jenis_kelamin == 'wanita')
                                        <option value="pria">pria</option>
                                        @elseif($supir->jenis_kelamin == 'pria')
                                        <option value="wanita">wanita</option>
                                        @endif
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
                                    <input id="alamat" type="text" class="form-control" name="alamat" value="{{$supir->alamat}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="aktif" class="col-md-4 col-form-label text-md-end">Status</label>
                                <div class="col-md-6">
                                    <select name="aktif" id="aktif">
                                        <option value="1" {{ ($supir->aktif == 1) ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ ($supir->aktif == 0) ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Update Supir
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