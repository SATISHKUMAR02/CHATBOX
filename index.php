<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
    #wrapper{
        max-width: 800px;
        min-height: 500px;
        max-height:630px;
        display: flex;
        margin: auto;
        color:white;
        font-size: 14px;
    }
    #leftpanel{
        min-height: 500px;
        background-color: black;
        flex: 1;

        text-align: center;
        
    }
    #profile_img{
     width: 50%;
     margin: 10px;
     border: solid thin grey;
     border-radius: 50%;
    }
    #leftpanel label{
     width: 100%;
     height: 30px;
     display: block;
     background-color: black;
     border-bottom: solid thin grey ;
     cursor: pointer;
     transition: all 1s ease  ;


    }
    #leftpanel label:hover{
     
     background-color: #778593;
     
   }
    #leftpanel label img{
     
        float: right;
        width: 25px;
        padding: 5px;
        height: 20px;

    }
    #rightpanel{
        min-height: 500px;
       text-align: center;
        flex: 4;
    }
    #header{
        background-color: #485b6c;
        height: 70px;
        font-size: 50px;
        text-align: center;
        position: relative;
    }
    #innerleft{
        background-color: #383e48;
        flex: 1;
        min-height:430px ;
        max-height: 530px;
    }
    #innerright{
        background-color: #f2f7f8;
        flex: 2;
        min-height:530px ;
        transition: all 0.7s ease;
        max-height: 630px;
    }
    #radio_contacts:checked ~ #innerright{
        flex: 0;
        

    }
    #radio_settings:checked ~ #innerright{
        flex: 0;
        

    }
    #contact{
        width: 100px;
        height: 120px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;;
        
    }
    #contact img{
        width: 100px;
        height: 100px;
    }
    #active_contact{
       
        height: 70px;
        border: solid thin black;
        margin: 10px;
        padding: 2px;
        background-color: #eee;
        color: black;
        
    }
    #active_contact img{
        width: 70px;
        height: 70px;
        float: left;
        margin: 2px;
    }
    #message_left{
       
       height: 70px;
       margin: 10px;
       padding: 2px;
       padding-right:10px ;
       box-shadow: 0px 0px 10px #aaa;
       background-color: #c979d5;
       color: black;
       float: left;
       position: relative;
       border-bottom-left-radius:50%;
       width: 70%;
       min-width: 200px;


       
   }
#message_left img{
       width: 60px;
       height: 60px;
       float: left;
       margin: 2px;
       border-radius: 50%;
       border: solid 1px black;

   }     
#message_left div{
       width: 10px;
       height: 10px;
       background-color: #33474f;

       border-radius: 50%;
       position: absolute;
       left: -10px;
       top: 20px;

   } 
   #message_right{
       
       height: 70px;
       margin: 10px;
       padding: 2px;
       padding-right:10px ;
       box-shadow: 0px 0px 10px #aaa;
       background-color: #655464;
       color: black;
       float: right;
       position: relative;
       border-bottom-right-radius:50%;
       width: 70%;
       min-width: 200px;
       
   }
#message_right img{
       width: 60px;
       height: 60px;
       float: right;
       margin: 2px;
       border-radius: 50%;
       border: solid 1px black;

   }     
#message_right div{
       width: 10px;
       height: 10px;
       background-color: #33474f;
       border-radius: 50%;
       position: absolute;
       right: -10px;
       top: 20px;

   }   
   #message_left {
       
       height: 70px;
       margin: 10px;
       padding: 2px;
       padding-right:10px ;
       box-shadow: 0px 0px 10px #aaa;
       background-color: #eee;
       color: black;
       float: left;
       position: relative;
       border-bottom-left-radius:50%;
       width: 70%;


       
   }
#message_left img{
       width: 60px;
       height: 60px;
       float: left;
       margin: 2px;
       border-radius: 50%;
       border: solid 1px black;

   }     
#message_left div{
       width: 10px;
       height: 10px;
       background-color: #33474f;
       border-radius: 50%;
       position: absolute;
       left: -10px;
       top: 20px;

   }               
.loader_on{
    position: absolute;
    width: 50%;
}
.loader_off{
    display: none;}
</style>
<body>
    <div id="wrapper">
        <div id= "leftpanel">
            <div id="user_info">
            <img id="profile_img"src="UI/PICS/usermale.png" alt="">
            <br>
            <span id="username">USERNAME</span><br>
            <span id="email" style="opacity:0.5">USEREMAIL.COM</span><br><br><br>
            <div >
            <label id="label_chat" for="radio_chat">CHAT <img src="UI/PICS/chat.jpg" ></label>
            <label id="label_contacts"  for="radio_contacts">CONTACTS <img src="UI/PICS/contacts.jpg" ></label>
            <label id="label_settings" for="radio_settings">SETTINGS<img src="UI/PICS/settings.jpg" ></label>
            <label id="logout" for="radio_logout">LOGOUT</label>
        
        </div>
            </div><br>
            
        </div>
        <div id= "rightpanel">
            <div id= "header">
            <div id="loader" class="loader_on"><img style="width: 60px;" src="UI/PICS/loadinggif.gif" ></div>
             MY CHAT</div>
            <div id = "container" style="display: flex;">
            <div id="innerleft">
                
                    
                    

                </div>
            <input type="radio" id="radio_chat" name="myradio" style="display: none;">
            <input type="radio" id="radio_contacts" name="myradio" style="display: none;">
            <input type="radio" id="radio_settings" name="myradio" style="display: none;">
                
                <div id= "innerright"></div>

            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    var CURRENT_USER="";

    function _(element){
        return document.getElementById(element);
    }
    var label_contacts=_("label_contacts");
    label_contacts.addEventListener("click",getcontacts);
    
    var get_chats=_("label_chat");
    get_chats.addEventListener("click",getchats);
    var  get_settings=_("label_settings");
    get_settings.addEventListener("click",getsettings);
    var logout=_("logout");
    logout.addEventListener("click",logout_user);


    
    function getdata(find,type){
        var xml= new XMLHttpRequest();
        var loader_h=_("loader");
        loader_h.className="loader_on";
        xml.onload=function(){
      if(xml.readyState==4||xml.status==200){
        loader_h.className="loader_off";
        handleResult(xml.responseText,type);
      }
        }
    var data={};
    data.find=find;
    data.data_type=type;
    data = JSON.stringify(data);    
    xml.open("POST","api.php",true);
    xml.send(data);
    }
    function handleResult(result,type){
        //alert(result);
        //alert(result);
        var inner_right =_("innerright");
        inner_right.style.overflow="visible";

     
        if(result.trim()!=""){
       
        var obj = JSON.parse(result);
        if(typeof(obj.logged_in)!="undefined" && !obj.logged_in){
            window.location="login.php";
        }else{
            switch(obj.data_type){
                case "user_info":
                    var username =_("username");
                    var email=_("email");
                    var profileimg=_("profile_img");

                    username.innerHTML=obj.username;
                    email.innerHTML=obj.email;
                    profileimg.src=obj.image;

                    
                    break;
                case "contacts":
                    var inner_left =_("innerleft");
                    

                    inner_right.style.overflow="hidden";
                    inner_left.innerHTML=obj.message;

                    
                   
                    break;  
                case "chats_refresh":
                    var message_holder =_("messages_holder");
                    message_holder.innerHTML-obj.message;


                    break;

                case "chats":
                    var inner_left =_("innerleft");
                    var inner_right =_("innerright");
                    

                    inner_left.innerHTML=obj.user;
                    inner_right.innerHTML=obj.messages;
                    var message_holder=_("messages_holder");
                    //message_holder.scroll(0,message_holder.scrollHeight);
                    setTimeout(function(){
                        message_holder.scrollTo(0,message_holder.scrollHeight);
                        var message_txt=_("message_txt");
                        message_txt.focus();

                    },100);
                                
                    break;
                case "settings":
                    var inner_left =_("innerleft");
                    

                    inner_left.innerHTML=obj.message;
                   
                    break;

                case "save_settings":                                  

                    alert(obj.message);
                    getdata({},"user_info");
                    getsettings(true);
                    break;
                    //case "send_message":                                

                      //  alert(obj.message);
                        
                        // break;    
                //send message function is removed
                 
            }
                
        }
     
    }}
    function logout_user(){
        var answer = confirm("are you sure you want to logout");
        if(answer){
            getdata({},"logout");

        }
        
    }
    getdata({},"user_info");
    getdata({},"contacts");

var radio_contacts=_("radio_contacts");
radio_contacts.checked=true;
    function getcontacts(e){
        getdata({},"contacts");
    }
    function getchats(e){
        getdata({},"chats");
    }
    function getsettings(e){
        getdata({},"settings");
    }
    function send_messages(e){
        var message_txt = _("message_txt");
        if(message_txt.value.trim()==""){
            alert("please enter some message")
            return;
        }
        //alert(message_txt.value);
        getdata({message:message_txt.value.trim(),
        userid:CURRENT_USER    

            
        },"send_message");

       
    }
function enter_press(e){
    if(event.keyCode==13){
        send_messages(e)

    }
    
}
setInterval(function(){
    if(CURRENT_USER !=""){
        getdata({userid:CURRENT_USER},"chats_refresh");

    }
    
    
},5000)


</script>
<script type="text/javascript">
            
            
            
function collect_data(){
var savesetbtn =_("savesetbtn");
savesetbtn.disabled=true;
savesetbtn.value="loading please wait.......";
var myform=_("myform");
var inputs=myform.getElementsByTagName("INPUT");
var data={};
for(var i=inputs.length-1;i>=0;i--){
    var key = inputs[i].name;
switch(key){
    case "username":
data.username=inputs[i].value;
break;
    case "password":
data.password=inputs[i].value;
break;
    case "password2":
data.password2=inputs[i].value;
break;
                            
    case "gender":                      
if(inputs[i].checked){

                            
data.gender=inputs[i].value;
                                
 }       
break; 
    case "email":
                                
data.email=inputs[i].value;
break;
    }

}
send_data(data,"save_settings");
    }

function send_data(data,type){
var xml = new XMLHttpRequest();
xml.onload=function(){
if(xml.readyState==4 || xml.status==200){
   handleResult(xml.responseText);
    var savesetbtn =_("savesetbtn");
   savesetbtn.disabled=false;
   savesetbtn.value="Signup";


                    }
                            }
data.data_type=type;
var datastring=JSON.stringify(data);
xml.open("POST","api.php",true);
xml.send(datastring);
                        

            }   
            

function upload_image(files){
    
   //var myfile=files[0].name;
    var changeimgbtn =_("changeimgbtn");
    changeimgbtn.disabled=true;
    changeimgbtn.innerHTML="upload.. image...";
    var myform=new FormData();
    var xml = new XMLHttpRequest();
    xml.onload=function(){
    if(xml.readyState==4 || xml.status==200){
        //alert(xml.responseText);
        getdata({},"user_info");
        getsettings(true);
        changeimgbtn.disabled=false;
        changeimgbtn.innerHTML="change image";


                }
                        }

    //data.data_type="changeprofileimage"                    
    myform.append('file',files[0]);                    
    myform.append('data_type',"changeprofileimage");
    
    xml.open("POST","uploader.php",true);
    xml.send(myform);
                    

}


function start_chat(e){
   var userid=e.target.getAttribute("userid");
    if(e.target.id==""){
       userid=e.target.parentNode.getAttribute("userid");
    }
    CURRENT_USER =userid;
    var radio_chat=_("radio_chat");
    radio_chat.checked=true;
    getdata({userid:CURRENT_USER},"chats");
}
     </script>