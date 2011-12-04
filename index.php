<?php
include('func.php');
include('conf.php');
$rip_id = "000"; // присваивается id на кого нападать в бодалке.

session_start();
if(!$_SESSION['loggedin']){
	header("Location: login.html");
	exit;
};

$user_cookie_file = $_SESSION['user_cookie_file'];
$k = $_SESSION['k'];
$server = $_SESSION['server'];
$flying1_id = $_SESSION['flying1_id'];
$flying2_id = $_SESSION['flying2_id'];
$flying3_id = $_SESSION['flying3_id'];
$useragent = 'Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
$httpheader = array(	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
						'Accept-Language: ru-ru,ru;q=0.8,en-us;q=0.5,en;q=0.3',
						'Accept-Encoding: identity ', //gzip, deflate',
						'Accept-Charset: utf-8;q=0.7,*;q=0.7');

if (isset($_GET['do']) and isset($_GET['as'])) 
				{
				$do = $_GET['do'];
				$as = $_GET['as'];
				$where = $_GET['where'];
					switch ($do) {
					case 'mine':
								if ($as == 'big') { 
													get("http://$server/mine.php?a=mine&m=start&t=2&k=$k");
													get("http://$server/mine.php?a=mine&m=lastSelected&k=$k");
													} 
								if ($as == 'smal') { 
													get("http://$server/mine.php?a=mine&m=start&t=1&k=$k");
													get("http://$server/mine.php?a=mine&m=lastSelected&k=$k");
													}
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'farm':
								if ($as == 'cancel') { post("http://$server/farm.php", "k=$k&cmd=$as");} 
								if ($as !== 'cancel') { post("http://$server/farm.php", "k=$k&cmd=do&work=$as");} 
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'bigtravel':
								if ($as == 'letun1') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_big&block=events&flying=$flying1_id");} 
								if ($as == 'letun2') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_big&block=events&flying=$flying2_id");}
								if ($as == 'letun3') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_big&block=events&flying=$flying3_id");}
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'smalltravel':
								if ($as == 'letun1') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_small&block=events&flying=$flying1_id&watch_time=10");} 
								if ($as == 'letun2') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_small&block=events&flying=$flying2_id&watch_time=10");}
								if ($as == 'letun3') { post("http://$server/castle.php?a=zoo&id=7", "k=$k&do_cmd=do_small&block=events&flying=$flying3_id&watch_time=10");}
								if (isset($_GET['sleep'])) {sleep(11);}
								header( "Location: /?where=$where", true, 307 ); 
								break;
					case 'help':
								if ($as == 'letun1') {
														get("http://$server/castle.php?a=zoo&id=7&block=events&flying=$flying1_id&do_cmd=minigame&take=1&k=$k");
														get("http://$server/castle.php?a=zoo&id=7");
													} 
								if ($as == 'letun2') { 
														get("http://$server/castle.php?a=zoo&id=7&block=events&flying=$flying2_id&do_cmd=minigame&take=1&k=$k");
														get("http://$server/castle.php?a=zoo&id=7");
													}
								if ($as == 'letun3') { 
														get("http://$server/castle.php?a=zoo&id=7&block=events&flying=$flying3_id&do_cmd=minigame&take=1&k=$k");
														get("http://$server/castle.php?a=zoo&id=7");
													}
								header( "Location: /?where=$where", true, 307 );
								break;				
					case 'watch':
								post("http://$server/dozor.php", "k=$k&auto_watch=$as");
								echo "watch";
								if (isset($_GET['sleep'])) {sleep(11);}
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'fight':
								if ($as == 'zorro') { 
													post("http://$server/dozor.php", "do_search=1&k=$k&zorro=1&type=more&name=");
													post("http://$server/dozor.php", "char_id=$rip_id&type=more&min=27&max=30&zorro=1&do_attack=1&k=$k");
													} 
								if ($as == 'monster') { 
													post("http://$server/dozor.php?a=monster", "k=$k&ptype=1&level=4");
													post("http://$server/dozor.php?a=attack", "k=$k");
													}
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'health':
								get("http://$server/ajax.php?m=drink&item=$as&auto_drink=undefined");
				//				  1,2,3 - бутылки для чара; 4,5,6 - бутылки для пета
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'training':
								post("http://$server/training.php?a=basic", "k=$k&stat=$as&cmd=do_upgrade");
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'mega1':
								$mega_way  = substr($as, 0, 1);
								$mega_time = substr($as, 1, 1);
								post("http://$server/ajax.php?m=mega&action=startmega", "flying_id=$flying1_id&type=$mega_way&stage_count=$mega_time");
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'mega2':
								$mega_way  = substr($as, 0, 1);
								$mega_time = substr($as, 1, 1);
								post("http://$server/ajax.php?m=mega&action=startmega", "flying_id=$flying2_id&type=$mega_way&stage_count=$mega_time");
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'mega3':
								$mega_way  = substr($as, 0, 1);
								$mega_time = substr($as, 1, 1);
								post("http://$server/ajax.php?m=mega&action=startmega", "flying_id=$flying3_id&type=$mega_way&stage_count=$mega_time");
								header( "Location: /?where=$where", true, 307 );
								break;
					case 'fulldrugs':
								$mega_way  = substr($as, 0, 1);
								$mega_time = substr($as, 1, 1);
								post("http://$server/castle.php?a=zoo&id=7", "flying_id=$flying3_id&type=$mega_way&stage_count=$mega_time");
								header( "Location: /?where=$where", true, 307 );
								break;
								}
				}




if (isset($_GET['where'])) 
{
$where = $_GET['where'];
	if ($where == 'main') 
		{
		params(browse("http://$server/index.php"), all);
		$_SESSION['flying1_id'] = substr($value[id_letun_1][0], strpos($value[id_letun_1][0], "flying=")+7, 5);	
		$_SESSION['flying2_id'] = substr($value[id_letun_2][0], strpos($value[id_letun_2][0], "flying=")+7, 5);
		$_SESSION['flying3_id'] = substr($value[id_letun_3][0], strpos($value[id_letun_3][0], "flying=")+7, 5);
		include('html/def.html');
		}
	if ($where == 'training') 
		{
		params(browse("http://$server/training.php"), 'training');
		include('html/training.html');
		}
	if ($where == 'dozor') 
		{
		params(browse("http://$server/dozor.php"), 'dozor');
		if ($value[IMFREE][0] == "Я свободен!") 
			{
				include('html/dozor.html');
			} 
			else 
			{
				echo 'Вы работаете на ферме или в дозоре, вернитесь сюда позже. <a href="/?where=main">Вернуться</a>';
			}

		}
	if ($where == 'post') 
		{
		params(browse("http://$server/post.php"), 'post');
		echo '<pre>'.str_replace(array("\t"), '',$value[POSTMESSAGES][0]).'</pre><br>|||<a href="/?where=main">Летуны</a>|||';

		}
	if ($where == 'clan') 
		{
		params(browse("http://$server/clan.php?id=51267"), 'clan');
		echo str_replace(array("\n","\t"), '',$value[clan_slava][0]). "	".str_replace(array("\n"), '',$value[clan_teg][0]);

		}
	if ($where == 'fight_log') 
		{
		$start_log_id = 445671046;
		for ($x=0; $x++<10;)
			{
			$log_id = $start_log_id + $x;
			params(browse("http://$server/fight_log.php?log_id=$log_id"), 'fight_log');
	//		echo strval(browse("http://$server/fight_log.php?log_id=445355696"));
	//		echo str_replace(array("\n"), '',$value[fight_lvl_attack][0]). "	".str_replace(array("\n"), '',$value[fight_drop][0]);
			
			if ((int)$value[fight_lvl_attack][0]> 60) 
				{
				u_fight_log(str_replace(array("\n","\t"), '',$value[fight_lvl_attack][0]), $value[fight_drop][0], "http://$server/fight_log.php?log_id=$log_id") ;
				} else { u_fight_log ($x, "", "");}
			usleep(300000);
			}
		}
	if ($where == '') {	header( 'Location: /?where=main', true, 307 );	}
} else { header( 'Location: /?where=main', true, 307 ); }

?>
