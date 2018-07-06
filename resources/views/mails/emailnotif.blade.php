<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Boardicle Email</title>
</head>
<body class="">
Hello <i>{{ $demo->receiver }}</i>,
<p>Dear {{ $demo->nama }}, Anda baru saja berhasil create transaksi dengan nomor transaksi: {{ $demo->trxId }}</p>
 
 
<div>
<p><b>Nama:</b>&nbsp;{{ $demo->nama }}</p>
<p><b>No HP:</b>&nbsp;{{ $demo->telp }}</p>
<p><b>Email:</b>&nbsp;{{ $demo->email }}</p>
<p><b>Special Request:</b>&nbsp;{{ $demo->special_req }}</p>

</div>
 
 
Thank You,
<br/>
</body>
</html>