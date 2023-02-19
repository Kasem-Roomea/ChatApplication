<?php

$info = (Object)[];
$image = "";
$sql_chat = "select * from user where userid = '$data_sending->userid'";
    
$result = mysqli_query($conn , $sql_chat);


if($result)
{
    $array = mysqli_fetch_array($result);
    if($array[7] != "")
{
 $image = $array[7];   
}
else
{
    $image = "username_image.png";
} 

    $info->status = "no";
    $info->connect =$array[6] ;
    $info->first = $array[1];
    $info->last = $array[2];
    $info->image = $image;
    $info->userid = $data_sending->userid;

}else
{
    $info->message = "error";
    $info->status = "no";
}



echo json_encode($info);
?>