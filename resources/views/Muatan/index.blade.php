@extends('layouts.adminBar')


@section('content')
<center><h4>Muatan</h4></center>
<br>
<div class="container">
   <form action="{{route('tambah_muatan')}}">
    <button type="submit">Tambah Muatan</button>
   </form>
</div>
<br>
<br><br>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga Per Item</th>
        <th scope="col">Maksimal</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        <?php $num = 1; ?>
        @forEach($muatans as $m)
        <tr>
            <th scope="row">{{$num}}</th>
            <td>{{$m->nama}}</td>
            <td>{{ 'Rp ' . number_format($m->harga_per_item, 0, ',', '.') }}</td>
            <td>{{$m->maksimal}}</td>
            <td>{{$m->aktif ? 'Aktif' : 'Tidak Aktif'}}</td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('edit_muatan', $m) }}" class="btn btn-warning">Edit</a>
                
                    {{-- <form action="{{ route('hapus_supir', $s->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form> --}}
                </div>
                actions
            </td>

          </tr>
          <?php $num++; ?>
        @endforeach
    </tbody>
  </table>
@endsection

