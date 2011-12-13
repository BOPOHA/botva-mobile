<?php
$xpath = array (
		'ERROR'				=> array ('/html/head/title', 'скажет об ощибке сервера? if error:echoerror?default', 'all'),
		'GOLD'				=> array ('//*[@id="gold"]/b', 'Золото на персонаже', 'all'),
		'CRYSTAL'			=> array ('//*[@id="crystal"]/b', 'Крисы на персе', 'all'),
		'GREEN'				=> array ('//*[@id="green"]/b', 'Зеленая-зелена трава', 'all'),
		'FISH'				=> array ('//*[@id="fish"]/b', 'Золотая рыбка', 'all'),
		'HP'				=> array ('//*[@id="char"]/i', 'Здоровье чара', 'all'),
		'PET'				=> array ('//*[@id="pet"]/i', 'Здоровье активного пета', 'all'),
		'time_server'		=> array ('//b[@id="time"]', 'Время сервера', 'all'),
		'time_work'			=> array ('//div[@id="rmenu1"]//div[@class="timers"]', 'Дела-ла-ла-ла!', 'all'),
		'IMMUN'				=> array ('//div[@id="rmenu1"]//span[@class="timer"]', 'Осталось иммунитета от нападения', 'all'),
		'IMFREE'			=> array ('//div[@id="rmenu1"]//a[@class="timer link"]', 'Время работы', 'all'),
		'status_letun_1'	=> array ('//div[@class="flyings"]//div[@class="content"][1]', 'Время первого летуна', 'all'),
		'status_letun_2'	=> array ('//div[@class="flyings"]//div[@class="content"][2]', 'Время второго летуна', 'all'),
		'status_letun_3'	=> array ('//div[@class="flyings"]//div[@class="content"][3]', 'Время третьего летуна', 'all'),
		'id_letun_1'		=> array ('//div[@class="flyings"]//div[@class="content"][1]//a/@href', 'Чтобы выдрать ID летуна', 'all'),
		'id_letun_2'		=> array ('//div[@class="flyings"]//div[@class="content"][2]//a/@href', 'Чтобы выдрать ID летуна', 'all'),
		'id_letun_3'		=> array ('//div[@class="flyings"]//div[@class="content"][3]//a/@href', 'Чтобы выдрать ID летуна', 'all'),
	//	'name_letun_1'		=> array ('.//*[@id="accordion"]/div[1]/div/div[1]/center/a', 'Имя первого летуна', 'all'),
	//	'name_letun_2'		=> array ('.//*[@id="accordion"]/div[1]/div/div[3]/center/a', 'Имя второго летуна', 'all'),
	//	'name_letun_3'		=> array ('.//*[@id="accordion"]/div[1]/div/div[5]/center/a', 'Имя третьего летуна', 'all'),
		'bigmine'			=> array ('.//*[@id="i34"]', 'Билет на большую поляну', 'all'),
		'smallmine'			=> array ('.//*[@id="i33"]', 'Билет на малую поляну', 'all'),
		'expLeft2LVLUP'		=> array ('.//*[@id="i32"]', 'Количество опыта до следующего уровня', 'all'),
		'POSTMESSAGES'		=> array ('//table[@class="default post_table "]', 'MESSAGES', 'post'),
		'time2zorro'		=> array ('.//*[@id="counter11"]', 'До следующего нападения с маской Zорро', 'dozor'),
		'time2monster'		=> array ('.//div[@id="monster_block"]/span[@id="counter_1"]', 'До следующего нападения на страшилку из бодалки', 'dozor'),
		'time2dozor'		=> array ('.//div[@class="grbody"]//p[5]', 'Осталось дозора', 'dozor'),
		'tr_power_v'		=> array ('.//table[@class="default center"]/form[1]/tr[2]/td[1]', 'Сила', 'training'),
		'tr_power_c'			=> array ('.//table[@class="default center"]/form[1]/tr/td[4]', 'Сила цена', 'training'),
		'tr_block_v'			=> array ('.//table[@class="default center"]/form[2]/tr[2]/td[1]', 'Защита', 'training'),
		'tr_block_c'			=> array ('.//table[@class="default center"]/form[2]/tr/td[4]', 'Защита цена', 'training'),
		'tr_dexterity_v'		=> array ('.//table[@class="default center"]/form[3]/tr[2]/td[1]', 'Ловка', 'training'),
		'tr_dexterity_c'		=> array ('.//table[@class="default center"]/form[3]/tr/td[4]', 'Ловка цена', 'training'),
		'tr_endurance_v'		=> array ('.//table[@class="default center"]/form[4]/tr[2]/td[1]', 'Масса', 'training'),
		'tr_endurance_c'		=> array ('.//table[@class="default center"]/form[4]/tr/td[4]', 'Масса цена', 'training'),
		'tr_charisma_v'			=> array ('.//table[@class="default center"]/form[5]/tr[2]/td[1]', 'Мастерство', 'training'),
		'tr_charisma_c'			=> array ('.//table[@class="default center"]/form[5]/tr/td[4]', 'Мастерство цена', 'training'),
		'clan_slava'			=> array ('.//*[@id="body"]/table/tr/td[2]/div/div[3]/table/tr[4]/td[2]', 'Слава клана', 'clan'),
		'clan_teg'				=> array ('.//*[@id="body"]/table/tr/td[2]/div/div[3]/table/tr[1]/td[2]', 'ТЭГ клана', 'clan'),

		'fight_lvl_attack'		=> array ('//table[@class="playerStats"]/tr[2]/td[3]', 'Уровень нападающего в бою', 'fight_log'),
		'fight_drop'			=> array ('.//table//tr[6]//*[@class="font_large"]', 'Награб в бою', 'fight_log')	
		);
	
$u_root_location_dir = "/botva-mobile";

?>

