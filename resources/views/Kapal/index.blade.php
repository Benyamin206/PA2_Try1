@extends('layouts.adminBar')


@section('content')
<center><h4>Kapal</h4></center>
<br>
<div class="container">
   <form action="{{route('tambah_kapal')}}">
    <button type="submit">Tambah Kapal</button>
   </form>
</div>
<br>
<br><br>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Gambar</th>
        <th scope="col">Kapasitas</th>
        <th scope="col">Status</th>
        <th scope="col">Available Booking</th>
        <th scope="col">Booking</th>
        <th scope="col">Aksi</th>

      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($kapals as $k)
        <?php 
        $url = Storage::url($k->gambar);
        ?>
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$k->nama}}</td>
            <td>{{$k->deskripsi}}</td>
            <td><img src="{{url('storage/Kapal_Image/'.$k->gambar)}}" alt="" height="100" width="100"></td>
            <td>{{$k->kapasitas}}</td>
            <td>{{$k->aktif ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td>{{$k->available_booking ? 'Ya' : 'Tidak'}}</td>
            <td>{{$k->booking ? 'Sedang Dibooking' : 'Free'}}</td>

            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('edit_kapal', $k->id) }}" class="btn btn-warning">Edit</a>
                
                    {{-- <form action="{{ route('hapus_supir', $s->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form> --}}
                </div>
                actions
            </td>
            <td></td>
          </tr>
          <?php $num++; ?>
        @endforeach
    </tbody>
  </table>
@endsection

