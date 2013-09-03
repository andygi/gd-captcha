<?
////////////////////////////////////////////////////////////
// definizione delle variabili
// $key = 'password to (en/de)crypt';
// $string = ' string to be encrypted '; // note the spaces
// 
// es. di richiamo della funzione
// $datacrypt = crypt_encrypt (10, $mouth);
////////////////////////////////////////////////////////////

function crypt_encrypt($key, $string) {
	$output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
	$output = str_replace("+", "-plus-", $output);
	return $output;
}

function crypt_decrypt($key, $string) {
	$string = str_replace("-plus-", "+", $string);
	$output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	return $output;
}


function key_gen($length = 5) {
    $string = md5(uniqid(rand(), true));
    $string = substr($string,1,$length);
    
    return $string;
}

?>