
<?php
$sql="select * from users where userid = :userid limit 1";
$id=$_SESSION['userid'];
$data=$DB->read($sql,['userid'=>$id]);

$mydata="";
if(is_array($data)){
    $data=$data[0];
    //check if image exists
    $image=($data->gender=="male")?"UI/PICS/usermale.png":"UI/PICS/userfemale.jpg";
    if(file_exists($data->image)){
        $image=$data->image;
    } 
$gender_m="";
$gender_fm="";
if($data->gender=="male"){
    $gender_m="checked";
}else{
    $gender_fm="checked";
}    

$mydata=
        '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <style type="text/css">
            
            form{
                margin: auto;
                padding: 10px;
                background-color: #383e48;
                width: 100%;
                max-width: 400px;
                text-align:left;
            }
            input[type=text],[type=password],[type=email],[type=button]{
                padding: 10px;
                margin: 10px;
                width: 80%;
                border-radius: 5px;
                border: solid 1px grey;

            }
            input[type=button]{
                width: 80%;
                cursor: pointer;
                background-color: #485b6c;
                color: white;
                padding: 10px;

            }
            input[type=radio]{
                transform: scale(1.1);
                cursor: pointer;

            }
            
        #error{
            text-align: center;
            padding:0.5em;
            background-color:#d20e0e;
            color:white;
            display:none;
        }
        #changeimgbtn{
            display:inline-block;
            padding:1em;
            border-radius:15px;
            background-color:#778593;
            cursor:pointer;
        }
        .draging{
            border:dashed 2px #aaa;

        
        }
        </style>

            
            
                <div id="error">ERROR</div>
                <div style="display:flex;">
                <div>
                <img ondragover="handle_drag(event)" ondrop="handle_drag(event)" ondragleave="handle_drag(event)" src="'.$image.'" style="width:200px;height:200px;margin:10px;"/>
                
                <label for ="changeimgip" id="changeimgbtn" >

                CHANGE IMAGE
                </label>
                <input type="file" name="submit" onchange="upload_image(this.files)" id="changeimgip" style="display:none"><br>

                </div>

                <form id="myform"action="">
                    <input type="text" name="username" placeholder="username" value="'.$data->username.'"><br>
                    <input type="email" name="email" placeholder="xyz@gmail.com" value="'.$data->email.'"><br>
                    <div style="padding: 10px;">
                    <br>GENDER:<br>
                    <input id="gender_male"type="radio" value="male" name="gender" '.$gender_m.'>MALE<br>
                    <input id="gender_female"type="radio" value="female" name="gender" '.$gender_fm.'>FEMALE<br>
                    </div>
                    <input type="password" name="password" placeholder="password" value="'.$data->password.'"><br>
                    <input type="password" name="password2" placeholder="password2" value="'.$data->password.'"><br>
                    <input type="button" name="submit" value="SAVE" id="savesetbtn" onclick="collect_data(event)"><br>
                
                </form>
                </div>

        ';
    

//$result=$result[0];
   
$info->message=$mydata;
$info->data_type="contacts";
echo json_encode($info);

}else{

  
$info->message="no contacts were found";
$info->data_type="error";
echo json_encode($info);  }
?>

                   