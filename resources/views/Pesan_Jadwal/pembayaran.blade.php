<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Load Snap.js script -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-X7iiMI_TmxPz6MiW"></script>
    <!-- Note: Change the URL to https://app.midtrans.com/snap/snap.js for Production environment -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>

    <div class="container">
        <h1>Tiket</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Detail Pesanan</h5>
              <p class="card-text">Ayo Lakukan pembayaran segera sebelum terlambat</p>
              <p> {{$order->id}}</p>
              <p>Nama : {{$order->user->name}}</p>
                <p>HP : {{$order->user->nomor_telepon}}</p>
                <p>Alamat : {{$order->user->alamat}}</p>
                <p>Qty : 
                    <ul>
                        @foreach($order->detail_pesan_jadwal as $dpj)
                            <li>{{$dpj->muatan->nama}} => {{$dpj->jumlah}}</li>
                        @endforeach
                    </ul>
                    
                </p>
                <p>Total price : {{ 'Rp.' . number_format($order->total_harga, 0, ',', '.')}}</p>
                <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                <!-- Include Snap token -->
                <input type="hidden" id="snapToken" value="{{$order->snap_token}}">
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
              var orderId = '{{$order->id}}'; // Ambil ID pesanan dari data yang ada di view
              
              // Kirim request Ajax ke endpoint backend untuk validasi stok

                          // Stok valid, lanjutkan ke pembayaran
                          var snapToken = $('#snapToken').val(); // Get Snap token from hidden input                       

                          // Trigger Snap popup
                          $('#pay-button').click(function(){
                            snap.pay(snapToken, {
                            onSuccess: function (result) {
                                // Payment success handling
                                window.location.href = 'tiket/{{$order->id}}';
                                console.log(result);
                            },
                            onPending: function (result) {
                                // Payment pending handling
                                alert("Waiting for payment!");
                                console.log(result);
                            },
                            onError: function (result) {
                                // Payment error handling
                                alert("Payment failed!");
                                console.log(result);
                            },
                            onClose: function () {
                                // Popup closed handling
                                alert('You closed the popup without finishing the payment');
                            }
                        });

                        });


                          
                      
  </script>
  
  
</body>
</html>

