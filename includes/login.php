<?php

$info=(Object)[];
$data=false;


//validate info



$data['email']=$DATA_OBJ->email;
//validate email

//validate password
if(empty($DATA_OBJ->email)){
    $error="please enter a valid email";
}
if(empty($DATA_OBJ->password)){
    $error="please enter a valid password";
}



if($error == ""){


$query="SELECT * from users where email =:email limit 1";
$result =$DB->read($query,$data);
if(is_array($result)){
    $result=$result[0];
    if($result->password==$DATA_OBJ->password){
        $_SESSION['userid']=$result->userid;
        $info->message="you are successfully logged in";
        $info->data_type="info";
        echo json_encode($info);

    }else{
        $info->message="wrong password";
        $info->data_type="error";
        echo json_encode($info);
    }
   
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