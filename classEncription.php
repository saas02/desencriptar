<?php

class EncoderData {
    
    private $privateKey = '0Bh9W9Qfqk17U2i0kj9h1c3v5pZa2aZ8';

    function Encode($decoded, $publicKey) {
        $key = $publicKey. "" .$this->privateKey;
        if ($decoded != null ) {
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $decoded, MCRYPT_MODE_CBC, md5(md5($key))));
        } else {
            $encoded = null;
        }
        return $encoded;
    }

    function Decode($encoded, $publicKey) {
        $key = $publicKey. "" .$this->privateKey;
        if ($encoded != null ) {
            $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        } else {
            $decoded = null;
        }
        return $decoded;
    }
    
    function RandomKey() {
        $randomKey = sha1(microtime(true).mt_rand(10000,90000));
        return $randomKey;
    }
}
