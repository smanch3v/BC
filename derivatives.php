<?php

include "header.php";

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.coingecko.com/api/v3/derivatives",
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
    foreach($data as $derivative[$i]){
        echo "<p>Market: " . $derivative[$i]["market"] . " Symbol: ".$derivative[$i]["symbol"]. " Price: ".
        $derivative[$i]["price"]." Change 24h ".$derivative[$i]["price_percentage_change_24h"]. " Contract Type: ".
        $derivative[$i]["contract_type"] ." Index: ". $derivative[$i]["index"] . " Basis".
        $derivative[$i]["basis"]." Spread:". $derivative[$i]["spread"]." Funding Rate: ".
        $derivative[$i]["funding_rate"] . " Open Interest: ". $derivative[$i]["open_interest"]." Volume 24h".
        $derivative[$i]["volume_24h"]. " Last Traded at: ".$derivative[$i]["last_traded_at"]."</p><br>";
    }
}

?>

