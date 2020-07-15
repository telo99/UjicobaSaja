<?php
// membuat gpx dari daftar koordinat quest dari discord
// live : http://poke.unaux.com/sdquest.php
$donlot=$_POST["donlot"];
$data=$_REQUEST["list"];
$namafile=$_POST["nama"];
$hasilgpx=$_POST["hasilgpx"];
if($namafile == ""){$namafile="rutequeststardust.gpx";}
else{$namafile= $namafile.".gpx";}

if(isset($donlot) && $donlot=="download"){
header('Content-Disposition: attachment; filename='.$namafile);
header('Content-Type: application/octet-stream');
echo $hasilgpx;
}
else{
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
Paste list koordinat quest di sini<br>
<form method="post">
<textarea name="list" rows="5" style="width:100%"></textarea><br>
<input type="submit" value="generate">
</form>

<?php 
if(isset($data) && $data !== ""){
echo '<form method="post">HASIL GENERATE<br><textarea name="hasilgpx" rows="10" style="width:100%"><?xml version="1.0" encoding="UTF-8" standalone="no" ?>'."\r\n".'<gpx version="1.1" creator="agus">'."\n";
//echo $data;
$baris=explode("\n",$data);
for($i=0;$i<count($baris);$i++)
{
$belah=explode(",", $baris[$i]);
$lat=$belah[0];
$lon=$belah[1];
echo '<wpt lat="'.$lat.'" lon="'.$lon.'"><name> </name></wpt>'."\r\n";
}

echo '</gpx></textarea><br>Nama file: <input name="nama" size="15"> <input name="donlot" value="download" type="submit"></form>';

}
?>

</body></html>
<?php
}
?>
