<?php

function random_str($length,$keys='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnoopqrstuvwxyz')
{
	$str='';
	$max = mb_strlen($keys,'8bit') - 1;
	for ($i=0; $i < $length; $i++) { 
		$str .= $keys[random_int(0, $max)];
	}
	return $str;
}

function set_active($path, $active='active')
 {
    return Request::is($path) || Request::is($path . '/*') ? $active: '';
 }

function encrypt_aes128($clear_text, $key, $iv) {
    
        $iv = str_pad($iv, 16, "\0");
        $encrypt_text = openssl_encrypt($clear_text, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
        $data = base64_encode($encrypt_text);
        return $data;
}

// function decrypt_aes128($data, $key, $iv) {
        
//         $iv = str_pad($iv, 16, "\0");
//         $encrypt_text = base64_decode($data);
//         $clear_text = openssl_decrypt($encrypt_text, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
//         return $clear_text;
// }

function decrypt_aes128($data) {
        
    $password = '8961B370B95DB029';
    $method = 'AES-128-CBC';
    $iv ='4f01bede9221586c';
    // My secret message 1234
    $decrypted = openssl_decrypt(base64_decode($data), $method, $password, OPENSSL_RAW_DATA, $iv);

    return $decrypted;
}
  
  
function decrypt_aes256($encrypted)
{
    $password = 'D3F7B83342CB632D';
    $method = 'aes-256-cbc';
    $iv ='4f01bede9221586c';
    // My secret message 1234
    $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);

    return $decrypted;
}
  

 function timeinmilliseconds()
{
        $t = microtime(true);
        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
        return $d->format("YmdHisu");
}


 function encryptMyString($plaintext)
{
	// enc to b64 inorder to escape special character
	$plaintext=base64url_encode($plaintext);
    $key = "QJytv0YD1DUIHMfR03a0cd8b54763051";
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ivector = base64url_encode($iv);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext_base64 = base64url_encode( $iv.$hmac.$ciphertext_raw );
     // dd($ciphertext_base64);
    return $ciphertext_base64;
 }

function decryptMyString($encryptString)
 {
    $key = "QJytv0YD1DUIHMfR03a0cd8b54763051";
    $c = base64url_decode($encryptString);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $decrypted_string = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    // if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
    // {
    //     // echo $original_plaintext."\n";
    // }

    $b64_dec=base64url_decode($decrypted_string);
    $b64_enc=base64url_encode($b64_dec);

    $plaintext=base64url_decode($b64_enc);
    
    return $plaintext;
 }

 function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 

if ( !function_exists('mysql_escape'))
{
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
}

if( !function_exists('doCurl'))
{
    function doCurl($url) {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $data = json_decode(curl_exec($ch), true);
          curl_close($ch);
          return $data;
        }
}
 function getProductPhotoDir()
{
    $data='storage/product_photo/';
    return $data;
}
function getNRCPhotoDir()
{
    $data='storage/nrc_photo/';
    return $data;
}
function getShopPhotoDir()
{
    $data='storage/shop_photo/';
    return $data;
}
function getShopLogoDir()
{
    $data='storage/shop_logo/';    
    return $data;
}
 function setPageName($pageName)
{
    $this->pageName = $pageName;
}