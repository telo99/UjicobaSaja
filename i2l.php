<?php
$donlot=$_POST["donlot"];
$data=$_REQUEST["json"];
$namafile=$_POST["nama"];
$hasilgpx=$_POST["hasilgpx"];
if($namafile == ""){$namafile="hasilgenerate.gpx";}
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
<form method="post">
<textarea name="json" rows="5" style="width:100%"></textarea><br>
<input type="submit" value="generate">
</form>

<?php 
if(isset($data) && $data !== ""){
echo '<form method="post">HASIL GENERATE<br><textarea name="hasilgpx" rows="10" style="width:100%">';
$jdec=(json_decode($data,true));
$jumlah=count($jdec['portals']['idOthers']['bkmrk']);
$ooo=($jdec['portals']['idOthers']['bkmrk']);
while (list($key, $val) = each($ooo)){echo $jdec['portals']['idOthers']['bkmrk'][$key]['latlng']."\n";}

echo '</textarea></form><pre>';
//print_r($jdec);
}
?>

</body></html>
<?php
}
?>