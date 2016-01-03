<?php
include "connMysql.php";
header('Content-Type: application/json;charset=utf-8');
date_default_timezone_set("Asia/Taipei");

$date = date("Y-m-d");
$time = date("H:i:s");
// $time1 = date("H:i:s",strtotime($time."-5 minute")) ;
$time1 = date("H:i:s",strtotime($time."-30 second")) ;



$sql_all_place = "SELECT * FROM `d_name`";
$row_all_place = mysql_query($sql_all_place);
while ($row_all = mysql_fetch_array($row_all_place,MYSQL_ASSOC)) {
	$row_all_['place'] = urldecode($row_all['place']);
	$row_data = $row_all_['place'];

	$count_ = 0;
	$sql_count = "SELECT * FROM `member` WHERE `place` = '$row_data' AND `date` = '$date' AND `time` BETWEEN '$time1' AND '$time'";


	$user_count = mysql_query($sql_count);
		while ($row_count = mysql_fetch_array($user_count, MYSQL_ASSOC)) {
    		$row_count_['name'] = urldecode($row_count['name']);
    		$count_ ++;
		}

		    $sql_number_count = "UPDATE `d_name` SET `number` = '$count_' WHERE `place` = '$row_data'";
		    mysql_query($sql_number_count);
}



$sql_name1 = "SELECT * FROM `d_name`";
$fetch1 = mysql_query($sql_name1);
$data_array1 = array();
$count = 0;
while ($row1 = mysql_fetch_array($fetch1, MYSQL_ASSOC)) {

    $row_data1['id'] = urlencode($row1['id']);
    $row_data1['place'] = urlencode($row1['place']);
    $row_data1['number'] = urlencode($row1['number']);
   
    $count ++;
    array_push($data_array1, $row_data1);

}

$sql_name2 = "SELECT * FROM `d_record` WHERE `place` = '出口1' AND `date` = '$date'";
$fetch2 = mysql_query($sql_name2);
$data_array2 = array();

$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
while ($row2 = mysql_fetch_array($fetch2, MYSQL_ASSOC)) {

    $row_data2['id'] = urlencode($row2['id']);
    $count1 ++;
   
    array_push($data_array2, $row_data2);

}

$sql_name3 = "SELECT * FROM `d_record` WHERE `place` = '出口2' AND `date` = '$date'";
$fetch3 = mysql_query($sql_name3);
$data_array3 = array();
while ($row3 = mysql_fetch_array($fetch3, MYSQL_ASSOC)) {

    $row_data3['id'] = urlencode($row3['id']);
    $count2 ++;
   
    array_push($data_array3, $row_data3);

}

$sql_name4 = "SELECT * FROM `d_record` WHERE `place` = '出口3' AND `date` = '$date'";
$fetch4 = mysql_query($sql_name4);
$data_array4 = array();
while ($row4 = mysql_fetch_array($fetch4, MYSQL_ASSOC)) {

    $row_data4['id'] = urlencode($row4['id']);
    $count3 ++;
   
    array_push($data_array4, $row_data4);

}
$sql_name5 = "SELECT * FROM `d_record` WHERE `place` = '出口4' AND `date` = '$date'";
$fetch5 = mysql_query($sql_name5);
$data_array5 = array();
while ($row5 = mysql_fetch_array($fetch5, MYSQL_ASSOC)) {

    $row_data5['id'] = urlencode($row5['id']);
    $count4 ++;
   
    array_push($data_array5, $row_data5);

}
$count_array = array("exit1" => $count1,"exit2" => $count2,"exit3" => $count3,"exit4" => $count4);




$information = array("place" => "UCCU", "node" => $count);
// $all = array("information" => $information,"data_1" => $data_array1,"data_2" => $count_array);
$all = array("information" => $information,"data_1" => $count_array,"data_2" => $data_array1);

echo urldecode(json_encode($all, JSON_PRETTY_PRINT));

mysql_close();
