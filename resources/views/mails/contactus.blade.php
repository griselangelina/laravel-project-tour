<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Notifikasi Pesan</title>
</head>
<body class="">
<p>Dear Admin, Anda mendapatkan pesan dari {{ $demo->name }}</p>
 
<div>
<p><b>Nama:</b>&nbsp;{{ $demo->name }}</p>
<p><b>No Telp:</b>&nbsp;{{ $demo->telp }}</p>
<p><b>Email:</b>&nbsp;{{ $demo->email }}</p>
<p><b>Pesan:</b>&nbsp;{{ $demo->message }}</p>


</div>
 
<p>Silahkan Menghubungi nya kembali</p>

</body>
</html>