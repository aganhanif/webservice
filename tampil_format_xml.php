<?php
Header ('Content-type:text/xml');

//Koneksi ke database akademik
$connection = mysqli_connect("localhost","root","","akademik") or die ("Error".mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');

//Menampilkan data database, dari tabel mahasiswa
$sql = "select * from mahasiswa";
$result = mysqli_query($connection,$sql) or die ("Error".mysqli_error($connection));

//Membuat array
while ($row = mysqli_fetch_assoc($result))
	{
	  $track = $xml->addChild('mahasiswa');
	  $track->addChild('nim',$row['nim']);
	  $track->addChild('nama',$row['nama']);
	  $track->addChild('alamat',$row['alamat']);
	  $track->addChild('progdi',$row['progdi']);
	}

  print ($xml->asXML());

 //Tutup koneksi database
 mysqli_close($connection);
?>