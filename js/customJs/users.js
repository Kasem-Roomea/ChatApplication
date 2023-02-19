//chang from text to input search 
//تغيير من كلام الى حقل ادخال للبحث في صفحة الاصدقاء 
        
var search_text = document.getElementById("search"),
    search_btn = document.getElementById("btnsearch"),
    iconsearch = document.getElementById("iconsearch");
if (search_btn) {
    search_btn.onclick = function () {
        if (search_text.innerText == "This Her You In Search Text") {
            search_text.innerHTML = "<input type='search' class='form-control text-search' placeholder='Enter Name To Search...'>";
            search_btn.classList.add("btn-dark");
            search_btn.classList.add("text-white");
            iconsearch.classList.remove("fa-search");
            iconsearch.classList.add("fa-times");
        } else {
            search_text.innerHTML = '<p class="fw-bold fs-4"> This Her You In Search Text</p>';
            search_btn.classList.remove("btn-dark");
            search_btn.classList.remove("text-white");
            iconsearch.classList.remove("fa-times");
            iconsearch.classList.add("fa-search");
        }


    }

}






//get inforrmation user form is database 
if (window.location == "http://localhost/php/chat/users.html") {
window.onload =function get_info()
{
    var xml = new XMLHttpRequest();
    xml.onload = function()
    {
        if(xml.status==200 || xml.readyState==4)
        {
            result_info(xml.responseText);
        }
    }
    var get_info ={};
    get_info.type_send = "get_info";
    var get_info_text =JSON.stringify(get_info);
    xml.open("POST" , "general.php" , true);
    xml.send(get_info_text);
}

}


//function result info users

function result_info(info)
{
    var info_users = JSON.parse(info);
    
var name_user = document.getElementsByClassName("name_user");
var image_profile = document.getElementsByTagName("img");
var active_point = document.getElementsByClassName("point_active") ;
var activ =document.getElementsByClassName("active_user") ;
var user_coustom =document.getElementsByClassName("custom-users") ;
    var warning = document.getElementsByClassName("warning");
    var frinds_show = document.getElementById("div_frinds");
    
    if(info_users.status =="ok")
       {
        name_user[0].innerHTML = info_users.username;
        if (info_users.active == 1) {
            active_point[0].classList.remove("text-danger");
            active_point[0].classList.add("text-success");
            activ[0].classList.remove("text-danger");
            activ[0].classList.add("text-success"); 
            activ[0].innerHTML = "active now";
        } else
        {
            active_point[0].classList.remove("text-success");
            active_point[0].classList.add("text-danger");
            activ[0].classList.remove("text-success");
            activ[0].classList.add("text-danger");
            activ[0].innerHTML = "no active";
        } 
         image_profile[0].src = info_users.image;
        frinds_show.innerHTML = info_users.data;
            user_coustom[0].style.display = "block";
            warning[0].style.display = "none";
    }

    else
    {
        warning[0].innerHTML =info_users.message ;
        user_coustom[0].style.display = "none";
        warning[0].style.display = "block";
        setTimeout(function(){
        window.location = "index.html";
        },4000)
    }
}







var logout_btn = document.getElementById('logout-btn');
if (logout_btn) {
    logout_btn.onclick = function logout() {
        var xml_logout = new XMLHttpRequest();
        xml_logout.onload = function () {
            if (xml_logout.status == 200 || xml_logout.readyState == 4) {
                result_logout(xml_logout.responseText);
            }
        }
        var logout = {};
        logout.type_send = "logout";
        var logout_text = JSON.stringify(logout);
        xml_logout.open("POST", "general.php", true);
        xml_logout.send(logout_text);
    }
}



//function result info users

function result_logout(info)
{
    var info_logout = JSON.parse(info);
        if (info_logout == "yes")
        {
            window.location = "login.html";
        }else
        {
            alert("can not logout now");
        }
}

function open_chat()
{
    window.location = "chat.html";
}
/*
   function open_chat(userid) {
        var xml_chat = new XMLHttpRequest();
        xml_chat.onload = function () {
            if (xml_chat.status == 200 || xml_chat.readyState == 4) {
                result_open_chat(xml_chat.responseText);
            }
        }
        var chat = {};
        chat.type_send = "chat";
        chat.userid = userid;
        var chat_text = JSON.stringify(chat);
        xml_chat.open("POST", "general.php", true);
       xml_chat.send(chat_text);
       
    }


function result_open_chat(info) {
    var info_chat = JSON.parse(info);

    if (info_chat.status == "yes") {
        window.location = "chat.html";
        var username = document.getElementById("username_chat");
        var image_chat = document.getElementById("image_chat");
        var activ_chat = document.getElementById("active_chat");
        username.innerHTML = info_chat.first + info_chat.last;
        image_chat.src = info_chat.image;
        if (info_chat.connect == 1) {
            activ_chat.innerHTML = "Activ Now";
            activ_chat.classList.add("text-success");
            activ_chat.classList.remove("text-danger");


        }
        else {
            activ_chat.innerHTML = "No Activ";
            activ_chat.classList.remove("text-success");
            activ_chat.classList.add("text-danger");
        }
    }
    else {
        alert(info_chat.message);
    }



}



//download image with object ajax to => uploding.php
function upload_image(files) {
    var lable_button = document.getElementById("chang_image");
    lable_button.disabled = true;
    lable_button.innerHTML = "Uploading Image ...";
    var myform = new FormData();
    var ajax5 = new XMLHttpRequest();

    ajax5.onload = function () {
        if (ajax5.readyState == 4 || ajax5.status == 200) {
            result_image(ajax5.responseText);
            lable_button.disabled = false;
            lable_button.innerHTML = "Change Image";
        }
    }

    myform.append("file", files[0]);
    myform.append("data_type", "Uploading");

    ajax5.open("POST", "uploding.php", true);
    ajax5.send(myform);

}


function result_image(info)
{
    var info_image = JSON.parse(info);
    if (info_image.data_type_save == "sucssafly") {
        var image_profile = document.getElementsByTagName("img");
        image_profile[0].src = info_image.gool;
    }
    else
    {
        alert(info_image.message);
    }
   
}

       */