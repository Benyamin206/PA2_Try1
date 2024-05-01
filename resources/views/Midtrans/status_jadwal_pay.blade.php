<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midtrans Order Status</title>
</head>
<body>

    <h1>Midtrans Order Status</h1>

    {{-- @dd($transactions) --}}
    {{-- @dd($data) --}}

    <h1>{{$data["status_code"]}}</h1>

    @if(isset($data["transaction_status"]))
        <h2>{{$data["transaction_status"]}}</h2>
    @endif
</body>
</html>

