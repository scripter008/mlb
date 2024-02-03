<?php
session_start();

	//Ստուգենք, արդյոք լեզուն դրված է սեսիայում, թե ոչ
	if(!isset($_SESSION['lang']))
	{
		//Եթե Լեզուն դրված չէ սեսիայում, ապա սահմանենք լռելյայն լեզուն որպես անգլերեն
		$_SESSION['lang'] = 'en';
	}
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
		if($_GET['lang'] == 'en'){
			$_SESSION['lang'] = 'en';
		}
		else if ($_GET['lang'] == 'hy') {
			$_SESSION['lang'] = 'hy';		
		}
		else if ($_GET['lang'] == 'cn') {
			$_SESSION['lang'] = 'cn';
		}
	}

	require_once $_SESSION['lang']. '.php';
?>