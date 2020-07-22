<?php

$input = readline("wat wil je encrypten ");
$not_so_secret_key = "very secret kEY";
$not_so_secret_IV = "very secret IV";
$method = "aes-128-gcm";

$key = hash("sha256", $not_so_secret_key);
$iv = substr(hash("sha256", $not_so_secret_IV), 0, 32);


$output_encrypted = openssl_encrypt($input, $method, $key, 0, $iv, $tag);
$output_encrypted = base64_encode($output_encrypted);
echo "de encrypted data is " . $output_encrypted . "\n";


$output_decrypted = openssl_decrypt(base64_decode($output_encrypted), $method, $key, 0, $iv, $tag);

echo "de decrypted data is $output_decrypted \n";

if ($input === $output_decrypted) {
    echo "succes";
} else {
    echo 'mislukt';
}