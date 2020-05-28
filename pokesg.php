<!DOCTYPE html>
<html>
<meta name="viewport"content="width=device-width, initial-scale=1">
<body>


<script>


function kopi(input) {
  var copyText = document.getElementById(input);
  copyText.select(); 
  copyText.setSelectionRange(0, 99999); 
  document.execCommand("copy");
  //alert("Copied text: " + copyText.value);
}
</script>

SGPOKEMAP SINGAPORE<br>
Contoh: 126 = magmar; 130 = gyarados<br>
<?php
$idmon=$_GET["id"];
$data=curlget("https://sgpokemap.com/query2.php?mons=$idmon&time=&since=0");
//$data=curlget("https://phpenthusiast.com/blog/five-php-curl-examples");
$json=(json_decode($data,true));
$jumlah=count($json['pokemons']);
echo "Ada ".$jumlah." pokemon<br>";
//echo $json['pokemons']['1']['lat'];
for($i=0;$i<$jumlah;$i++){
	$pokeid=$json['pokemons'][$i]['pokemon_id'];
	$pokelat=$json['pokemons'][$i]['lat'];
	$pokelng=$json['pokemons'][$i]['lng'];
	$pokecp=$json['pokemons'][$i]['cp'];
  $pokelevel=$json['pokemons'][$i]['level'];
$pokeatk=$json['pokemons'][$i]['attack'];
$pokedef=$json['pokemons'][$i]['defence'];
$pokesta=$json['pokemons'][$i]['stamina'];
	echo "$pokeid => <input id=\"text$i\" value=\"$pokelat, $pokelng\"> cp: $pokecp ($pokeatk/$pokedef/$pokesta - L$pokelevel) <button onclick=\"kopi('text$i')\">Copy koord</button><br>";
	
	
}
//print_r($json);
function curlget($url){
$agent=$_SERVER['HTTP_USER_AGENT'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_REFERER, "https://sgpokemap.com/?forcerefresh");
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_COOKIE, "__cfduid=d64181f88b6b1328084bd8ce44653a3bd1580239667; _ga=GA1.2.1339834080.1580239686; _gid=GA1.2.892599051.1580239686; __gads=ID=37e89750a05f395e:T=1580239705:S=ALNI_MZLnHgkWYXkvuzPHMara2k1LnKBkA");
$response = curl_exec($ch);
curl_close($ch);
return($response);
}
?>


</body>
</html>