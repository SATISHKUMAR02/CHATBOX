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
        min-width: 500px;
        
        margin: auto;
        color:#485b6c;
        font-size: 14px;
    }    
    form{
        margin: auto;
        padding: 10px;
        background-color: white;
        width: 100%;
        max-width: 400px;
    }
    input[type=text],[type=password],[type=email],[type=button]{
        padding: 10px;
        margin: 10px;
        width: 94%;
        border-radius: 5px;
        border: solid 1px grey;

    }
    input[type=button]{
        width: 100%;
        cursor: pointer;
        background-color: #485b6c;
        color: white;

    }
    input[type=radio]{
        transform: scale(1.1);
        cursor: pointer;

    }
    #header{
        background-color: #485b6c;
       
        font-size: 50px;
        text-align: center;
        width: 100%;
        color: white;
    }
#error{
    text-align: center;
    padding:0.5em;
    background-color:#d20e0e;
    color:white;
    display:none;
}
</style>
<body>
    <div id="wrapper">
        <div id="header">MYCHAT
            <div style="font-size: 20px;font-family:'Times New Roman', Times, serif;">SIGN UP</div>
        </div>
        <div id="error">SOME TEXT</div>
        <form id="myform"action="">
            <input type="text" name="username" placeholder="username"><br>
            <input type="email" name="email" placeholder="xyz@gmail.com"><br>
            <div style="padding: 10px;">
            <br>GENDER:<br>
            <input id="gender_male"type="radio" value="male" name="gender_male">MALE<br>
            <input id="gender_female"type="radio" value="female" name="gender_female">FEMALE<br>
            </div>
            <input type="password" name="password" placeholder="password"><br>
            <input type="password" name="password2" placeholder="password2"><br>
            <input type="button" name="submit" value="sign up" id="signupbtn"><br><br><br>
            <a href="login.php" style="display: block;text-align:center;text-decoration:none">LOGIN</a>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    function _(element){
        return document.getElementById(element);
    }
    var signupbtn =_("signupbtn");
    signupbtn.addEventListener("click",collect_data);
    function collect_data(){
        signupbtn.disabled=true;
        signupbtn.value="loading please wait.......";
        var myform=_("myform");
        var inputs=myform.getElementsByTagName("input");
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
                case "email":
                    data.email=inputs[i].value;
                    break;
                case "gender_male":
                case "gender_female":
                    if(inputs[i].checked){

                   
                    data.gender=inputs[i].value;
                    
                }       
                    break; 
            }
        }
        send_data(data,"signup");
    }
        function send_data(data,type){
            var xml = new XMLHttpRequest();
            xml.onload=function(){
                 if(xml.readyState==4 || xml.status==200){
                    handleResult(xml.responseText);
                    signupbtn.disabled=false;
                    signupbtn.value="Signup";


        }
                 }
                 data.data_type=type;
                 var datastring=JSON.stringify(data);
                 xml.open("POST","api.php",true);
                 xml.send(datastring);
            

        
    }   
    function handleResult(result){
        var data=JSON.parse(result);
        if(data.data_type=="info"){
           window.location= "index.php";
        }else{
            var error = _("error");
            error.innerHTML=data.message;
            error.style.display="block";

        }
    } 



</script>