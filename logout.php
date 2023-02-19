<?php 
session_start();


$query_insert_date = "UPDATE user SET state = 0 WHERE userid = '$_SESSION[userid]'";


$result = mysqli_query($conn , $query_insert_date); 
if ($result)
{
    session_unset();
    session_destroy();
    echo json_encode("yes");
}
else
{
    echo json_encode("no");
}






?>