<?php
session_start(); 
$DATA_RAW=file_get_contents("php://input");
$DATA_OBJ=json_decode($DATA_RAW);
$info=(object)[];
if(!isset($_SESSION["userid"])){
    if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type !="login" && $DATA_OBJ->data_type !="signup"){
        $info->logged_in=false;
        echo json_encode($info);
        die;
    }
   
}
require_once("classes/autoload.php");
$DB=new Database();

$error="";
if(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="signup"){
    include("includes/signup1.php");
    }else
        if(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="login"){
            include("includes/login.php");
        
        }elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="logout"){
            include("includes/logout.php");
        }
        elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="user_info"){
            include("includes/user_info.php");
            
        }    
        elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="contacts"){
            include("includes/contacts.php");
            
        }  
        elseif(isset($DATA_OBJ->data_type)&& ($DATA_OBJ->data_type=="chats" || $DATA_OBJ->data_type=="chats_refresh")){
            include("includes/chats.php");
            
        }    
        elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="settings"){
            include("includes/settings.php");
            
        }
        elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="save_settings"){
            include("includes/savesettings.php");
            
        }
        elseif(isset($DATA_OBJ->data_type)&&$DATA_OBJ->data_type=="send_message"){
            include("includes/send_message.php");
            //$info->message=$DATA_OBJ;
            //echo json_encode($info);
            
        }       
    function message_left($data,$row){
        $image=($row->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
        if(file_exists($row->image)){
            $image=$row->image;
        }
        //alwasys on when the code runs  
        return "
        <div id ='message_left'>
        <div>
        </div>
        <img src='$image'>
        <b>$row->username</b><br>
        $data->message<br><br>
        <span style='font-size:11px;color:#888;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
        </div> ";

    }      
    function message_right($data,$row){
        $image=($row->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
        if(file_exists($row->image)){
            $image=$row->image;
        }
        return "
        <div id ='message_right'>
        <div></div>
        <img src='$image' style='float:right'>
        <b>$row->username</b><br>
        $data->message<br><br>
        <span style='font-size:11px;color:#999;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
        </div>";
    }      
    
    function message_controls(){
        return "
        </div>    
        <div style='display:flex;width:100%;height:40px;'>
        <label for='file'><img src ='UI/PICS/attach.jpg' style='opacity:0.8;width:30px;margin:5px;cursor:pointer;'></label>
        <input type='file' id='message_file' name='file' style='display:none;'/>
        <input id='message_txt' onkeyup='enter_press(event)' style='flex:6;border:solid thin #ccc;border-bottom:none;font-size:11px;' type='text'   placeholder='type your message'/>
        <input style='flex:1;cursor:pointer;' type='button' cursor:pointer; value='send' onclick='send_messages(event)'/>
        </div></div>"; 
    }
?>