<?php

$data_request = (Object)[];
$error = "";


sleep(1);

    //valdite firstname 
    $first_name = $data_sending->firstname;
if($first_name == "" ||empty($first_name))
    {
        $error .= "Plase Enter First Name ..!  <br>";
    }else{
        if(strlen($first_name)>7)
        {   
        $error .= "First Name Height Num Letter..!  <br>";
        }

        if(!preg_match("/^[a-z A-Z]*$/",$first_name))
        {
            $error .= "Plase Enter a Valid First Name ..! <br>";
        }

    }









    //valdite last name  
    $last_name= $data_sending->lastname;
    if($last_name == "" || empty($last_name))
    {
        $error .= "Plase Enter Last Name ..!  <br>";
    }else{
        if(strlen($last_name)>7)
        {   
        $error .= "Last Name Height Num Letter..!  <br>";
        }

        if(!preg_match("/^[a-z A-Z]*$/",$last_name))
        {
        $error .= "Plase Enter a Valid Last Name ..! <br>";
        }

    }








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
  $random=0;
 for($i=0 ; $i<10 ; $i++ )
    {
        $rand = rand(0,50);
        $random .=$rand;
    }
$date = "";    
$userid = $random;
$active = 1;    

include("config.php");
    
    
$sql_insert = "INSERT INTO user(`userid`, `first`, `last`,`email`, `password`, `date`,`state`) value('$userid','$first_name','$last_name','$email','$password','$date','$active') ";
    

$result_insert = mysqli_query($conn ,$sql_insert);  

    if($result_insert)
    {
        $data_request->message = "Wlcom To Web Site...";
        $data_request->data_valdite = "ok";
        echo json_encode($data_request);
    }
    else
    {
        $data_request->message ="error data base..";
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