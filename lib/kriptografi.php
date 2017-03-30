<?php
class mcrypt
{
private $cipher = MCRYPT_RIJNDAEL_256;
private $mode = MCRYPT_MODE_CBC;

function encryptIt( $q ) {
    global $key;
    $qEncoded = base64_encode( mcrypt_encrypt($this->cipher, md5($key), $q,  $this->mode, md5(md5($key))));
    return( $qEncoded );
}

function decryptIt( $q ) {
    global $key;
    $qDecoded = rtrim( mcrypt_decrypt( $this->cipher, md5($key), base64_decode($q),  $this->mode, md5(md5($key))));
    return( $qDecoded );
    }
}
?>
