<?php

$url = "https://www.convertcsv.io/api/v1/csv2sql?";
$headers = array(
    "Authorization: Token c67cbde5f1cc1a6396ec5d8ee70ebd17616359df"
);
$uploadsDirectory = "uploads/";
$files = scandir($uploadsDirectory);
$firstFile = $uploadsDirectory . $files[2];


$fields = array(
    "infile" => new CURLFile($firstFile)
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($ch);
echo $output;

curl_close($ch);

file_put_contents("MYOUTPUTFILE.EXT", $output);

?>
