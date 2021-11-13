<?php
include "header.php";
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.coingecko.com/api/v3/exchanges",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",

]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
    $i = 0;
    foreach($data as $exchange[$i]){
        echo "<p>" . $exchange[$i]["name"] . " - Trust score: ".$exchange[$i]["trust_score"]."</p><br>";
    }
}

?>

