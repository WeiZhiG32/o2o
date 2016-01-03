<?php
include("connMysql.php");
header('Content-Type: application/json;charset=utf-8');
date_default_timezone_set("Asia/Taipei");

// $android_id = @$_REQUEST['android_id'];
$name = @$_GET['name'];
// $name = "B";
// $uuid = @$_REQUEST['uuid'];
// $major = @$_REQUEST['major'];
// $minor = @$_REQUEST['minor'];
$place = @$_GET['place'];
// $place = "統二鞋店";

// 樂涼冰淇淋  統二鞋店  奇樂咖啡  城市3C  今生服飾  金礦咖啡
$date = date("Y-m-d");
$time = date("H:i:s");
$time1 = date("H:i:s",strtotime($time."-5 minute")) ;
$count = 0;
$count_ = 0;
$data = array();
// 判斷使用者
$sql_user_deter = "SELECT * FROM `member` WHERE `name` = '$name'";
$deter = mysql_query($sql_user_deter);
while ($row_deter = mysql_fetch_array($deter, MYSQL_ASSOC)) {
    @$row_deter_['name'] = $row_deter['name'];
}
if (@$row_deter_['name'] == null) {
    $sql_new_member = "INSERT INTO `member` (`name`)VALUES('$name')";
    mysql_query($sql_new_member);
}
// 紀錄
$sql_insert_data = "INSERT INTO `d_record` (`name`, `place`, `date`, `time`) 
VALUES ('$name' ,'$place' , '$date' ,'$time')";
mysql_query($sql_insert_data);

// 計算經過人數流量 存於 d_number
$sql_all_user = "SELECT * FROM `d_record` WHERE `place` = '$place' AND `date` = '$date' AND `time` BETWEEN '$time1' AND '$time' ORDER BY `name`";

$all_user = mysql_query($sql_all_user);
while ($row = mysql_fetch_row($all_user, MYSQL_ASSOC)) {
    $row_data['name'] = urldecode($row['name']);
    if ($row_data['name'] != $data) {
        $count++;
            }
    $data = $row_data['name'];
}

$sql_user_count = "INSERT INTO `d_number` (`place`, `number`, `date`, `time`) 
VALUES('$place', '$count', '$date', '$time')";
mysql_query($sql_user_count);

//更新使用者目前位置 
$sql_update = "UPDATE `member` SET `place` = '$place',`date` = '$date',`time` = '$time' WHERE `name` = '$name'";
mysql_query($sql_update);

// $sql_count = "SELECT * FROM `member` WHERE `place` = '$place' AND `date` = '$date' AND `time` BETWEEN '$time1' AND '$time'";
// $user_count = mysql_query($sql_count);
// while ($row_count = mysql_fetch_array($user_count, MYSQL_ASSOC)) {
//     $row_count_['name'] = urldecode($row_count['name']);
//     $count_ ++;
// }

// $sql_place = "SELECT * FROM `d_name`";
// $all_place = mysql_query($sql_place);
// while ($row_place = mysql_fetch_array($all_place, MYSQL_ASSOC)) {
//     $row_place_['place'] = urldecode($row_place['place']);

//     $place_row = $row_place_['place'];

//     $sql_number_count = "UPDATE `d_name` SET `number` = '$count_' WHERE `place` = '$place_row'";
//     mysql_query($sql_number_count);
//     // echo $row_place_['place'];
//     // echo $row_place_;
// }



mysql_close();

?>