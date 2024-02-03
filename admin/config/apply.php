<?php 
	ob_start();
	include('functions.php');

	//Սահմանել լռելյայն ժամային գոտի
	date_default_timezone_set('Asia/Yerevan');

	//Այժմ ստեղծենք նոր օբյեկտ ֆունկցիաների համար
	$obj=new Functions();

	//Այժմ միացվում է տվյալների բազան
	$conn = $obj->db_connect();
	//Տվյալների բազայի ընտրություն
	$db_select = $obj->db_select($conn);
?>