@extends('layouts.adminBar')

@section('content')


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

<center><h4>Rute</h4></center>
<br>
<div class="container">
   <form action="{{route('tambah_rute')}}">
    <button type="submit">Tambah Rute</button>
   </form>
</div>

<br><br>
  {{-- @foreach($stoks as $s)
      <h1>{{$s['id']}}</h1>
      @foreach($s['total'] as $ts)
        <p>{{$ts}}</p>
      @endforeach
    <br><br><br>
  @endforeach --}}

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Lokasi Berangkat</th>
        <th scope="col">Lokasi Tujuan</th>
        <th scope="col">Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($rutes as $r)
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$r->lokasi_berangkat}}</td>
            <td>{{$r->lokasi_tujuan}}</td>
            <td>{{$r->aktif ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td>
                {{-- <div class="d-flex gap-2">
                    <a href="{{ route('edit_muatan', $m) }}" class="btn btn-warning">Edit</a>
                </div> --}}
                <form action="{{route('edit_rute', $r->id)}}">
                    <button type="submit">Edit</button>
                </form>   
            </td>
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