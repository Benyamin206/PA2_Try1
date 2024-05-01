@extends('layouts.adminBar')

@section('content')
<center><h1>List Pemilik Kapal</h1></center>
<br>
<br>

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
@endif
<br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Jenis Kelamin</th>
      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($pk as $p)
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$p->name}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->nomor_telepon}}</td>
            <td>{{$p->jenis_kelamin}}</td>

            <td></td>
          </tr>
          <?php $num++; ?>
        @endforeach
    </tbody>
  </table>
@endsection

                    {{-- <form action="{{ route('hapus_supir', $s->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form> --}}