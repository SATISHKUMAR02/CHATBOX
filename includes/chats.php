
<?php
$arr['userid']="null";
if(isset($DATA_OBJ->find->userid)){
    $arr['userid']=$DATA_OBJ->find->userid;

}
$refresh=false;
if($DATA_OBJ->data_type=="chats_refresh"){
    $refresh=True;
}
$sql = "select * from users where userid = :userid limit 1";

 //$mydata=print_r($DATA_OBJ);
//$arr['userid']=$DATA_OBJ->find->userid;
$result=$DB->read($sql,$arr);
if(is_array($result)){
    $row=$result[0];
    $image=($row->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
    if(file_exists($row->image)){
        $image=$row->image;
    }
    $row->image=$image;
    $mydata="";
    if(!$refresh){

    
    $mydata =" NOW CHATTING WITH:<br>
    <div id ='active_contact' >
        <img src='$image'>
        $row->username
    </div>";
}
$messages="";
if(!$refresh){
    $messages=
    
    "<div id='messages_holder_main' style='height:530px;'>
    <div id='messages_holder' style='height:480px;overflow-y:scroll;'>";
}

    $a['sender']=$_SESSION['userid'];
    $a['receiver']=$arr['userid'];
      
    $sql = "select * from messages where (sender = :sender && receiver = :receiver) || (sender = :receiver && receiver = :sender) order by id desc limit 10";

    //$mydata=print_r($DATA_OBJ);
    //$arr['userid']=$DATA_OBJ->find->userid;
    $result2=$DB->read($sql,$a);
    if(is_array($result2)){
        $result2=array_reverse($result2);
        foreach($result2 as $data){
            $myuser=$DB->get_user($data->sender);

            if($data->receiver==$_SESSION['userid']){

                $DB->write("update messages set received = 1 where id='$data->id' limit 1");
            }
            if($_SESSION['userid']==$data->sender){
                $messages.=message_right($data,$myuser);


            }else{
                $messages.=message_left($data,$myuser);

            }
        }
        //$arr['msgid']=$result2[0]->msgid;
    }

    
    if(!$refresh){


    $messages.=message_controls();
    }
    $info->user=$mydata;
    $info->messages=$messages;
    $info->data_type="chats";
    if($refresh){
    $info->data_type="chats_refresh";}
    echo json_encode($info);


}else{
    $a['userid']=$_SESSION['userid'];
    //$a['receiver']=$arr['userid'];
      
    $sql = "select * from messages where (sender = :userid || receiver = :userid) group by msgid order by id desc limit 10";

    //$mydata=print_r($DATA_OBJ);
    //$arr['userid']=$DATA_OBJ->find->userid;
    $result2=$DB->read($sql,$a);
    $mydata="previous chats:<br>";
    if(is_array($result2)){
        $result2=array_reverse($result2);
        $other_user=$data->sender;
        if($data->sender==$_SESSION['userid']){
            $other_user=$data->receiver;


        }
        foreach($result2 as $data){
            $myuser=$DB->get_user($other_user);
            $image=($myuser->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
            if(file_exists($myuser->image)){
                $image=$myuser->image;
            }
            //$row->image=$image;
            $mydata .="
            
            <div id ='active_contact' userid ='$myuser->userid' onclick='start_chat(event)' style='cursor:pointer'>

                <img src='$image'>
                $myuser->username<br>
                <span>'$data->message'</span>
            </div>";
        }
        //$arr['msgid']=$result2[0]->msgid;
    }
    $info->user=$mydata;
    $info->messages="";
    $info->data_type="chats";
    
    echo json_encode($info);
}




?>

                   