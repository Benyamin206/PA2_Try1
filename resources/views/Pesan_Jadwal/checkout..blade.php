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
<center>
    <h1>Tiket</h1>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Detail Pesanan</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <p>{{$order->id}}</p>
          <p>Nama : {{$order->name}}</p>
            <p>HP : {{$order->phone}}</p>
            <p>Alamat : {{$order->address}}</p>
            <p>Qty : {{$order->qty}}</p>
            <p>Total price : {{ 'Rp.' . number_format($order->total_price, 0, ',', '.') }}</p>
            
            <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
            <!-- Include Snap token -->
            <input type="hidden" id="snapToken" value="{{$snapToken}}">
        </div>
      </div>
</center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#pay-button').click(function(){
              var orderId = '{{$order->id}}'; // Ambil ID pesanan dari data yang ada di view
              
              // Kirim request Ajax ke endpoint backend untuk validasi stok
              $.ajax({
                  url: '/validate-stock/' + orderId,
                  type: 'GET',
                  success: function(response) {
                      if (response.success) {
                          // Stok valid, lanjutkan ke pembayaran
                          var snapToken = $('#snapToken').val(); // Get Snap token from hidden input
  
                          // Trigger Snap popup
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
                      } else {
                          // Stok tidak valid, tampilkan pesan kesalahan
                          alert('Stok tidak mencukupi! Silakan cek ketersediaan stok dan coba lagi.');
                      }
                  },
                  error: function() {
                      // Error handling
                      alert('Terjadi kesalahan saat melakukan validasi stok. Silakan coba lagi.');
                  }
              });
          });
      });
  </script>
  
  
</body>
</html>
