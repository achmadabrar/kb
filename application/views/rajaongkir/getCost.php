<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 0eae42fce3bbdaaaae65207aa026821e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);

  
}
?>

<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
			 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {			 
			 $nilai = strtoupper($courier)." - ".strtoupper($data['rajaongkir']['results'][$k]['costs'][$l]['service'])." ".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
			 $nilai2 = strtoupper($courier)." ".$data['rajaongkir']['results'][$k]['costs'][$l]['service']." Rp.".number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'], 0, ',', '.')." (Estimasi : ".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']." Hari)";
			echo "<option value='".$nilai."'>".$nilai2."</option>";
			 }
			
			
 }
 ?>