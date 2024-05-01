{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ship Ticket</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --}}

  @extends('layouts.app')
@section('content')


  <style>
    body {
      background-color: #f8f9fa;
      padding: 50px;
    }
    .ticket {
      background: linear-gradient(135deg, #3498db, #9b59b6);
      border-radius: 20px;
      padding: 30px;
      max-width: 500px;
      margin: auto;
      position: relative;
      border: 2px solid #fff;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }
    .ticket:before, .ticket:after {
      content: '';
      position: absolute;
      width: calc(100% + 6px);
      height: calc(100% + 6px);
      top: -3px;
      left: -3px;
      border-radius: 20px;
    }
    .ticket:before {
      background: linear-gradient(135deg, #3498db, #9b59b6);
      z-index: -1;
    }
    .ticket:after {
      background: #fff;
      z-index: -2;
    }
    .ticket-header {
      text-align: center;
      padding-bottom: 20px;
      border-bottom: 2px solid #fff;
    }
    .ticket-header h3 {
      margin-bottom: 0;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .ticket-body {
      padding: 20px 0;
    }
    .ticket-body h5 {
      color: #fff;
      text-align: center;
      margin-bottom: 20px;
      font-size: 20px;
    }
    .ticket-details {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .ticket-details p {
      margin-bottom: 10px;
      font-size: 16px;
      color: #333;
    }
    .cargo-details {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .cargo-details h5 {
      margin-bottom: 10px;
      font-size: 18px;
      color: #333;
    }
    .ticket-footer {
      text-align: center;
      padding-top: 20px;
    }
    .btn-print {
      background-color: #fff;
      color: #3498db;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }
  </style>


  <div class="ticket">
    <div class="ticket-header">
      <h3>Ship Ticket</h3>
    </div>
    <div class="ticket-body">
      <div class="ticket-details">
        <h3><strong>Rute : </strong> {{$order->jadwal->rute->lokasi_berangkat}} - {{$order->jadwal->rute->lokasi_tujuan}}</h3>
        <p><strong>Waktu Keberangkatan : </strong> {{$order->jadwal->waktu_berangkat}}</p>
        <p><strong>Nama Pemesan :</strong> {{$order->user->name}} </p>
        <p><strong>Dipesan pada :</strong> {{$order->ditambahkan_pada}}</p>
      </div>

      <div class="cargo-details">
        <h5>Cargo Details</h5>
        @php
          $totalHarga = 0;
        @endphp
        @foreach ($order->detail_pesan_jadwal as $dpj)
        <p><strong>{{$dpj->muatan->nama}}</strong> :  {{$dpj->jumlah}} (Harga per item =>{{ 'Rp.' . number_format($dpj->muatan->harga_per_item, 0, ',', '.') }}
          )</p> 
        @php
          $totalHarga += $dpj->jumlah * $dpj->muatan->harga_per_item;
        @endphp
        @endforeach
      </div>
    </div>
    <center>
      <div>
      {!!  DNS2D::getBarcodeHTML("$order->id", 'QRCODE',4,4) !!}
      <br>
      <p style="color: yellow">{{$order->id}}</p>
    </div>
    </center>

    <div class="ticket-footer">
      <h2 style="color: white"><strong>Total Harga : </strong>{{ 'Rp.' . number_format($totalHarga, 0, ',', '.') }}</h2>
      <td></td>

      <button class="btn btn-print" onclick="window.print()"><strong>Print Ticket</strong></button>
    </div>
    
  </div>


  {{-- {{!!  DNS2D::getBarcodeHTML("$order->id", 'PHARMA') !!}} --}}


  {{-- <br><br>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
@endsection

