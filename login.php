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
    input[type=text],[type=password],[type=email],[type=submit]{
        padding: 10px;
        margin: 10px;
        width: 94%;
        border-radius: 5px;
        border: solid 1px grey;

    }
    input[type=submit]{
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
            <div style="font-size: 20px;font-family:'Times New Roman', Times, serif;">LOGIN</div>
        </div>
        <div id="error">SOME TEXT</div>
        <form id="myform"action="">
           
            <input type="email" name="email" placeholder="xyz@gmail.com"><br>
            
            <input type="password" name="password" placeholder="password"><br>
            
            <input type="submit" name="submit" value="login" id="loginbtn"><br>
            <a href="signup.php" style="display: block;text-align:center;text-decoration:none">CREATE AN ACCOUNT</a>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    function _(element){
        return document.getElementById(element);
    }
    var loginbtn =_("loginbtn");
    loginbtn.addEventListener("click",collect_data);
    function collect_data(e){
       e.preventDefault();
        loginbtn.disabled=true;
        loginbtn.value="loading please wait.......";
        var myform=_("myform");
        var inputs=myform.getElementsByTagName("input");
        var data={};
        for(var i=inputs.length-1;i>=0;i--){
            var key = inputs[i].name;
            switch(key){
                
                case "password":
                    data.password=inputs[i].value;
                    break;
                
                case "email":
                    data.email=inputs[i].value;
                    break;
                case "gender":
                    if(inputs[i].checked){

                   
                    data.gender=inputs[i].value;
                    
                }       
                    break; 
            }
        }
        send_data(data,"login");
    }
        function send_data(data,type){
            var xml = new XMLHttpRequest();
            xml.onload=function(){
                 if(xml.readyState==4 || xml.status==200){
                    handleResult(xml.responseText);
                    loginbtn.disabled=false;
                    loginbtn.value="LOGIN";


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