<?
function getRemoteFile($url,$post,$referer='')
{
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_TIMEOUT, 70);
if($post)
{
	curl_setopt($ch, CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
}

$response = curl_exec ($ch);
if(is_int($response)) {
    die("Errors: " . curl_errno($ch) . " : " . curl_error($ch));
}
curl_close ($ch);
return $response;
}
function getRemoteHTMLBody($url,$post='',$referer='')
{
      $response = getRemoteFile($url,$post,$referer);      
	// strip down to just inner HTML
      $pos      = strpos($response, "<body>");
      $response = substr($response, $pos + 6);
      $a = split('</body>', $response);
      return $a[0];

}
function basicAuthenPass($user,$pass)
{
	return base64_encode($user.':'.$pass);
}
?>