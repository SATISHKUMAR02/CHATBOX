<?php

$info=(Object)[];

$data=false;
$data['userid']=$_SESSION['userid'];

//validate username
$data['username']=$DATA_OBJ->username;
if(empty($DATA_OBJ->username)){
    $error .= "please enter a valid username1.<br>";
}else{
    if(strlen($DATA_OBJ->username)<3){
        $error .="username must be atleast more than 3 characters.<br>";
    }
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$DATA_OBJ->username)){
        $error .="please enter a valid username2.<br>";
    }
    

}

$data['email']=$DATA_OBJ->email;
//validate email
if(empty($DATA_OBJ->email)){
    $error .= "please enter a valid email.<br>";
}else{
    
    if (!filter_var($DATA_OBJ->email, FILTER_VALIDATE_EMAIL)) {
        $error .="please enter a valid email.<br>";
    }
    

}
$data['gender']=isset($DATA_OBJ->gender)?$DATA_OBJ->gender:null;
//validate gender
if(empty($DATA_OBJ->gender)){
    $error .= "please select  a gender.<br>";
}else{
    
    if ($DATA_OBJ->gender !="male" &&$DATA_OBJ->gender!="female") {
        $error .="please enter a valid email.<br>";
    }
    

}
//validate password
$data['password']=$DATA_OBJ->password;
$password=$DATA_OBJ->password2;
if(empty($DATA_OBJ->password)){
    $error .= "please enter a valid password1.<br>";
}else{
    if($DATA_OBJ->password!=$DATA_OBJ->password2){
        $error .="passwords must match.<br>";
    }
    if(strlen($DATA_OBJ->password)<6){
        $error .="password must be atleast 6 characters.<br>";
    }
    

}

if($error == ""){



$query="update users set username=:username,email=:email,gender=:gender,password=:password where userid = :userid limit 1";
$result =$DB->write($query,$data);
if($result){
    
    $info->message="your data was saved";
    $info->data_type="save_settings";
    echo json_encode($info);
}
else{
    
    $info->message="YOUR data NOT was saved";
    $info->data_type="save_settings";
    echo json_encode($info);
    
}
}else{

$info->message=$error;
$info->data_type="save_settings";
echo json_encode($info);

}
?>