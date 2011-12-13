<?php

function u_log($a, $b, $c) {
	global $user_cookie_file;
						$fp = fopen("log.txt", "a"); 
						$shtamp = date('Y-m-d H:i:s');
						$mytext = $shtamp.$user_cookie_file."-->".$a."-->".$b."-->".$c."\r\n"; 
						$test = fwrite($fp, $mytext);
						fclose($fp); 
						}
function u_fight_log($a, $b, $c) {
	global $user_cookie_file;
						$fp = fopen("fightlog.txt", "a"); 
						$shtamp = date('Y-m-d H:i:s');
						$mytext = $shtamp.$user_cookie_file."-->".$a."-->".$b."-->".$c."\r\n"; 
						$test = fwrite($fp, $mytext);
						fclose($fp); 
						}
function browse($url) {
	global $useragent, $httpheader, $user_cookie_file;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
		curl_setopt($ch, CURLOPT_COOKIEJAR,  $user_cookie_file); 
//		$html = strval(curl_exec($ch));
		$html = curl_exec($ch);
		curl_close($ch);
		if (!$html) {
//		die("$url не доступен, возможно вы чем-то заняты и не можете получиьт данные из этой локации");
		echo $url.' не доступен, возможно вы чем-то заняты и не можете получиьт данные из этой локации';
		} else {
//		$html = iconv('cp1251', 'UTF-8', $html );
			return  $html;
		}
}

function params($content, $location) {
	global $xpath, $k , $value, $rip_id;
		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		@$dom->loadHTML($content);
		$xdom = new DOMXPath($dom);
		$rip_id = $xdom -> query('//form/input[@type="hidden" and @name="char_id"]/@value') -> item(0) ;
		$k =  substr($content, strpos($content,"var KEY=")+8 ,5);
		//$xdom -> query('//form/input[@type="hidden" and @name="k"]/@value') -> item(0) -> value;
		$_SESSION['k'] = $k ;
		if ($location != "0") 
		{
			foreach ($xpath as $user_param => $val)
			{
				if ( $val[2] == $location or $val[2] == 'all') {
											$value[$user_param][0] = $xdom -> query($val[0]) -> item(0) -> nodeValue;
											$value[$user_param][1] = $val[1];}
												if ($value['ERROR'][0] == '504 Gateway Time-out')
													{die('504 Gateway Time-out, try to refresh later');}
											
			}
		}
}	
function post($url, $poststring) {
	global $user_cookie_file, $useragent, $httpheader;
		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_USERAGENT,	$useragent);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
			curl_setopt($ch, CURLOPT_COOKIEJAR,  $user_cookie_file); 
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring);
		$html = curl_exec($ch);
		curl_close($ch);
		u_log('post', $url, $poststring);
		params($html,0);
//		$html = iconv('cp1251', 'UTF-8', $html );
//		echo $html;
}
function get($url) {
	global $user_cookie_file, $useragent, $httpheader, $k;
		$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_USERAGENT,	$useragent);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
				curl_setopt($ch, CURLOPT_NOBODY, 0);
				curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
				curl_setopt($ch, CURLOPT_COOKIEJAR,  $user_cookie_file); 
		$transfer = curl_exec($ch);
		curl_close($ch);
		$k = substr($transfer, strpos($transfer,"var KEY=")+8 ,5);
		u_log('get', $url, $k);
//     echo  iconv('cp1251', 'UTF-8', $transfer);
//echo  $transfer;
}
function get_slava($url) {
	global $user_cookie_file, $useragent, $httpheader, $k;
		$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_USERAGENT,	$useragent);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
				curl_setopt($ch, CURLOPT_NOBODY, 0);
				curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
				curl_setopt($ch, CURLOPT_COOKIEJAR,  $user_cookie_file); 
		$transfer = curl_exec($ch);
		curl_close($ch);
		$k = substr($transfer, strpos($transfer,"var KEY=")+8 ,5);
		u_log('get', $url, $k);
//     echo  iconv('cp1251', 'UTF-8', $transfer);
//echo  $transfer;
}
?>
