<?php


session_start();
$data_request = (Object)[];
$error = "";

sleep(1);

//valdite Email

$email= $data_sending->email;
              if(empty($email))
          {
             $error .= "Plase Enter Email ..!<br>";
          }else
          {
            
              if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-])/",$email))
              {
                  $error .= "Plase Enter a Valid Email ..! <br>";
              }
          }




//valdite password 
$password= $data_sending->password;

if(empty($password))
{
    $error .= "Plase Enter The Password ..! <br>";
}
else{
   if(strlen($password)>8)
    {
        $error .= "Password Letter Most than 8 Char..! <br>";
    }
}







if ($error == "")
{
   

$sql_select = "select * from user where email = '$data_sending->email'";
    
$result_select = mysqli_query($conn , $sql_select);
//$num = mysql_num_rows($result_select) or die("");

    if($result_select)
    {
        $array_info = mysqli_fetch_array($result_select);
        if($array_info[3]!=$data_sending->email)
        {
        $data_request->data_valdite = "no";
        $data_request->message = "Email is not found..!";
        echo json_encode($data_request);
        }
        
        
        else if($array_info[4]!=$data_sending->password)
        {
        $data_request->data_valdite = "no";
        $data_request->message = "password is not corect a email..!";
        echo json_encode($data_request);
        }
        
        
        else
        {
        $data_request->data_valdite = "yes";
        $data_request->message = "Welcom To Web Site...";
        $data_request->userid = $array_info[0];
        $_SESSION['userid'] = $array_info[0];   
        $query_insert_date = "UPDATE user SET state = 1 WHERE userid = '$_SESSION[userid]'";
        $result_insert_date = mysqli_query($conn , $query_insert_date); 
        echo json_encode($data_request);
        }
    }
    else
    {
        $data_request->message = "Not Found Is Acount In DataBase ..!";
        $data_request->data_valdite = "no";
        echo json_encode($data_request);
    }  
    
}

else
{
    $data_request->message = $error;
    $data_request->data_valdite = "no";
    echo json_encode($data_request);   
}












?>