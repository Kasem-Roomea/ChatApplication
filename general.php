<?php


//get data sending from page singup.html

$data_json = file_get_contents("php://input");
$data_sending = json_decode($data_json);



include ("config.php");

//convert to page singup and login
if(isset($data_sending->type_send) && $data_sending->type_send == "sing_or_login")
{
    include("singup.php");   
}




if(isset($data_sending->type_send) && $data_sending->type_send == "login")
{
    include("login.php");
}



if(isset($data_sending->type_send) && $data_sending->type_send == "get_info")
{
    include("frinds.php");
}


if(isset($data_sending->type_send) && $data_sending->type_send == "logout")
{
    include("logout.php");
}
if(isset($data_sending->type_send) && $data_sending->type_send == "chat")
{
    include("chat.php");
}



  
    
    
    
    
    
?>