<?php
$url = "http://localhost/Respwd/operator/get_data.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);
foreach ($result as $r) {
    echo "<p>";
    echo "Id lapangan : " . $r->id_lap . "<br />";
    echo "No lapangan : " . $r->no_lap . "<br />";
    echo "Jenis lapangan : " . $r->jenis_rumput . "<br />";
    echo "Harga : " . $r->harga . "<br />";
    echo "</p>";
}
