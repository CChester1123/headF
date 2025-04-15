<?php
	date_default_timezone_set('Asia/Manila');
	$date1 = "2023-05-22 15:00:00";
	// $date2 = "2023-05-22 15:20:00";
	$date2=date("Y-m-d H:i:s") . "<br>";


	$test = strtotime($date1) + 1500;
echo date("Y-m-d H:i:s", $test);
	// $from_time = strtotime($date1); 
	// $to_time = strtotime($date2);

	// $sum = $to_time - $from_time;


	// $time = strtotime('20 mins');
	// echo date("H:i:s", $time);

// echo date('H:i:s', $sum)
?>