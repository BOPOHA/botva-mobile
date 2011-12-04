<?php
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$server = $_POST['server'];
$user_pass_file = "hiden/$server.$user.pass";
$user_cookie_file = "hiden/$server.$user.cook";
$_SESSION['user_cookie_file'] = $user_cookie_file;
$_SESSION['server'] = $server;
$loginurl = "http://$server/login.php"; 
$servernumber = "должно обозначать номер сервера, но неважно какую хрень я тут напишу... все равно пойдет";
$remember = "1";
$useragent = 'Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
$httpheader = array(	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
						'Accept-Language: ru-ru,ru;q=0.8,en-us;q=0.5,en;q=0.3',
						'Accept-Encoding: identity ', //gzip, deflate',
						'Accept-Charset: utf-8;q=0.7,*;q=0.7');

function init_cookie($url) {
	global $user_cookie_file, $do_cmd, $servernumber, $user, $pass, $remember ;
	$password = urlencode($pass);
	$login = urlencode($user);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $user_cookie_file);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"do_cmd=login&server=$servernumber&email=$login&password=$password&remember=$remember");
	$html = curl_exec($ch);
	curl_close($ch);
//	echo $html;
}




if (is_file($user_pass_file))
		{
		$f = fopen($user_pass_file, "r");
		$passtr = fgets($f, 4096);
		echo $passtr;
		fclose($f);
			if ( $pass == $passtr) {
									$_SESSION['loggedin'] = true;
									header("Location: index.php");
									};

		};
						$f = fopen($user_pass_file, "w");
						fputs($f, $pass);
						fclose($f);
						$f = fopen($user_cookie_file, "w");
						fclose($f);
						init_cookie($loginurl); 
						$_SESSION['loggedin'] = true;
						header("Location: index.php");
?>
