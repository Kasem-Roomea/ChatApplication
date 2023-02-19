<?php


session_start();


include("config.php");


$data_info = (Object)[];

if (isset($_SESSION['userid']))
{
    $sql_get = "select * from user where userid ='$_SESSION[userid]'";
    $result = mysqli_query($conn , $sql_get);
    
    if($result)
    {
       $array_info = mysqli_fetch_array($result);
       $data_info->status =  "ok";
       $data_info->username =$array_info[1]." " . $array_info[2];
       //$data_info->active =$array_info[4];
      echo json_encode($data_info);
    }
    else
    {
       $data_info->status =  "no";
       $data_info->message = mysqli_error();
       echo json_encode($data_info); 
    }
    
}
else
{
       $data_info->status = "no session";
       $data_info->message = "Sorry , We Can't View The Page ";
       echo json_encode($data_info); 
}








?>