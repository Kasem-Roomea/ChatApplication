<?php
$frinds = (Object)[];
$active = "";
$active_frind = "";
$image = "";



session_start();




$sql_frinds = "select * from user";


$result = mysqli_query($conn,$sql_frinds);


$data = "";


while($array_frinds = mysqli_fetch_array($result))
{
    if (isset($_SESSION['userid'])){
        
    if($array_frinds[0] != $_SESSION['userid'])
    
    {
        
        //check active or no 
        if($array_frinds[6]==1)
        {
            $active_frind = "text-success";
        }
        else
        {
            $active_frind = "text-danger";
        }
        
        //check image yes or no
        if($array_frinds[7] != "")
        {
            $image_page = $array_frinds[7];
        }
        else
        {
            $image_page = "username_image.png" ;
        }
        
        
    $data .= '<div class="col-12 pt-5 chat_open" userid ='.$array_frinds[0].' onclick="open_chat()">
              <img src='.$image_page.' class="image-chat-person float-start me-3" userid ='.$array_frinds[0].'>
              <span class="float-start fw-bold fs-4 name_user_search" userid ='.$array_frinds[0].'>'. $array_frinds[1] ." ". $array_frinds[2].' </span>

             <i class="fas fa-circle '. $active_frind .' float-end mt-2"></i>                    
            <br><br>
            <span class="float-start message" userid ='.$array_frinds[0].'>This Is kasem roomea randoum</span>
            </div>';
    }
    
    
    else
    {   
        
       $status =  "ok";
       $name = $array_frinds[1] ." ". $array_frinds[2];
        $active = $array_frinds[6];
                
        //check image yes or no
        if($array_frinds[7] != "")
        {
            $image_profile = $array_frinds[7];
        }
        else
        {
            $image_profile = "username_image.png" ;
        }
        $image = $image_profile;
        $message = "";    
    
    }
}
else
{
       $status = "no session";
       $message = "Sorry , We Can't View The Page ";
        $name ="";
}

    }


$frinds->data = $data ;
$frinds->username = $name ;
$frinds->message = $message;
$frinds->status = $status;
$frinds->active = $active;
$frinds->image = $image;



echo json_encode($frinds);




?>