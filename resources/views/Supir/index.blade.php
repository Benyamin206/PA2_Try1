@extends('layouts.adminBar')

@section('content')
<center><h4>NAHKODA</h4></center>
<br>
<div class="container">
   <form action="{{route('tambah_supir')}}">
    <button type="submit">Tambah Nahkoda</button>
   </form>
</div>
<br>
<br><br>

<!-- Di bagian bawah file view Anda -->
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Tampilkan SweetAlert dengan pesan flash
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
    @elseif (session('delete'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Tampilkan SweetAlert dengan pesan flash
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Menghapus Nahkoda!',
            text: '{{ session('success') }}',
        });
    </script>
@endif




<table class="table">
    <thead>
      <tr>
        <th scope="col">#1</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Nomor HP</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($supirs as $s)
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$s->name}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->nomor_hp}}</td>
            <td>{{$s->jenis_kelamin}}</td>
            <td>{{$s->aktif ? "Aktif" : "Tidak Aktif"}}</td>

            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('edit_supir', $s) }}" class="btn btn-warning">Edit</a>
                    {{-- <a href="{{ route('hapus_supir', $s) }}" class="btn btn-danger">Hapus</a> --}}

                    <form action="{{ route('hapus_supir', $s->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </td>
            <td></td>
          </tr>
          <?php $num++; ?>
        @endforeach
    </tbody>
  </table>
  @include('sweetalert::alert')
@endsection

