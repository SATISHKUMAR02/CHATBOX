<?php

$info=(Object)[];
$data=false;


//validate info



$data['userid']=$_SESSION['userid'];
//validate email

//validate password




if($error == ""){


$query="SELECT * from users where userid =:userid limit 1";
$result =$DB->read($query,$data);
if(is_array($result)){
    $result=$result[0];
    $result->data_type="user_info";
    //check if image exists
    $image=($result->gender=="male")? 'UI/PICS/usermale.png':'UI/PICS/userfemale.jpg';
    if(file_exists($result->image)){
        $image=$result->image;
    } 
    $result->image=$image;
    echo json_encode($result);
    
    
}
else{
    
    $info->message="wrong email";
    $info->data_type="error";
    echo json_encode($info);
    
}
}else{

$info->message=$error;
$info->data_type="error";
echo json_encode($info);

}
?>