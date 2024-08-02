
<?php
$myid=$_SESSION['userid'];
$sql = "select * from users where userid != '$myid' limit 10";
$myusers=$DB->read($sql,[]);

$mydata=
'
<style>
#contact{
    cursor:pointer;
    transition:all 0.5s ease;
}
#contact:hover{
    
    transform:scale(1.2);
}

</style>
<div style="text-align: center;">';
if(is_array($myusers)){
    foreach($myusers as $row){
    $image=($row->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
    if(file_exists($row->image)){
        $image=$row->image;
    }    
    $mydata .="
    <div id ='contact' userid ='$row->userid' onclick='start_chat(event)'>
        <img src='$image'>
        <br>$row->username
    </div>";
}
}
$mydata.='</div>';

//$result=$result[0];
$info->message=$mydata;
$info->data_type="contacts";
echo json_encode($info);
die;

$info->message="no contacts were found";
$info->data_type="error";
echo json_encode($info);
?>

                   