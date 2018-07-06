<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Notifikasi Pesan</title>
</head>
<body class="">
<p>Dear Admin berikut request Custom Trip terbaru</p>
 
<div>
<p><b>Trx ID:</b>&nbsp;{{ $demo->trxId }}</p>

<p><b>First Name:</b>&nbsp;{{ $demo->firstname }}</p>
<p><b>Family Name:</b>&nbsp;{{ $demo->familyname }}</p>
<p><b>Email:</b>&nbsp;{{ $demo->email }}</p>
<p><b>Telp:</b>&nbsp;{{ $demo->telp }}</p>
<p><b>Destination:</b>&nbsp;{{ $demo->destination }}</p>
<p><b>Depart Date:</b>&nbsp;{{ $demo->depart_date }}</p>
<p><b>Adult Number:</b>&nbsp;{{ $demo->adult_num }}</p>
<p><b>Child Number:</b>&nbsp;{{ $demo->child_num }}</p>
<p><b>Hotel :</b>&nbsp;{{ $demo->hotel }}</p>
<p><b>Airline :</b>&nbsp;{{ $demo->airline }}</p>
<p><b>Special Request:</b>&nbsp;{{ $demo->spes_req }}</p>

</div>
 
<p>Silahkan Menghubungi nya kembali</p>

</body>
</html>