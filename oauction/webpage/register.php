<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);
if(isset($_POST['submit']))
{
$name=$_POST["user"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$mobile=$_POST["mobile"];
$addr=$_POST["addr"];
$imgsrc=addslashes("\oauction\profile\avatar.png");
$sql="INSERT INTO `onlineauction`.`account` (`name`, `password`, `email`, `mobileno`, `address`, `userid`, `imgsrc`) VALUES ('$name', '$pass', '$email', '$mobile', '$addr', NULL, '$imgsrc');";
$res=mysql_query($sql,$db);
print("<script>window.location.href='/oauction/webpage/login.php'</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
body{
    background-image: url("\\oauction\\profile\\bk.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
#register{
     width: 100%;
    background-color: darkgray;
    opacity: 0.8;
    padding: 30px 20px;
    box-shadow: 0 10px 150px;
    border-radius: 15px;
}
</style>
</head>
    <body>
        <div class="container">
            <h1 class="text-success text-center"> Registration Form</h1>
            <div class="col-lg-8 m-auto d-block">
                <form method="post" onsubmit="return validation()" id="register">
                    <div class="form-group">
                        <label> Username: </label>
                        <input type="text" name="user" class="form-control" id="user" autocomplete="off">
                        <span id="username" class="text-danger font-weight-normal"></span>
                    </div> 
                    
                    <div class="form-group">
                        <label> E-mail: </label>
                        <input type="text" name="email" class="form-control" id="emails" autocomplete="off">
                        <span id="emailids" class="text-danger font-weight-normal"></span>

                    </div>
                    
                    <div class="form-group">
                        <label> Password: </label>
                        <input type="password" name="pass" class="form-control" id="pass" autocomplete="off">
                        <span id="passwords" class="text-danger font-weight-normal"></span>
                        
                    </div> 
                    
                    <div class="form-group">
                        <label> Confirm Password: </label>
                        <input type="password" name="conpass" class="form-control" id="conpass" autocomplete="off">
                        <span id="confrmpass" class="text-danger font-weight-normal"></span>
                        
                    </div>
                    
                    <div class="form-group">
                        <label> Mobile Number: </label>
                        <input type="text" name="mobile" class="form-control" id="MobileNumber" autocomplete="off">
                        <span id="mobileno" class="text-danger font-weight-normal"></span>

                    </div>
                    
                    <div class="form-group">
                        <label> Address : </label>
                        <input type="textarea" rows="2" cols="50" name="addr" class="form-control" id="address" autocomplete="off">
                        <span id="addrs" class="text-danger font-weight-normal"></span>

                    </div>
                    
                    <center><input type="submit" name="submit" value="submit" class="btn btn-success "></center>
                </form>
            </div>
        </div>
        
        <script type="text/javascript">
            
            function validation(){
                
                var user = document.getElementById('user').value;
                var emails = document.getElementById('emails').value;
                var pass = document.getElementById('pass').value;
                var conpass = document.getElementById('conpass').value;
                var MobileNumber = document.getElementById('MobileNumber').value;
                var address = document.getElementById('address').value;
                
                                
                if(user==""){
                    document.getElementById('username').innerHTML="Please fill the username field";
                    return false;
                }
                if((user.length <= 2) || (user.length > 20)){
                    document.getElementById('username').innerHTML="user length must be 2 to 20";
                    return false;       
                }
                if(!isNaN(user)){
                    document.getElementById('username').innerHTML="Only characters are allowed";
                    return false;
                }
                
                if(emails==""){
                    document.getElementById('emailids').innerHTML="Please fill the E-mail id field";
                    return false;
                }
                if(emails.indexOf('@') <= 0){
                    document.getElementById('emailids').innerHTML="@ Invalid position";
                    return false;
                }
                if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
                    document.getElementById('emailids').innerHTML=". Invalid position";
                    return false;
                }
                
                if(pass==""){
                    document.getElementById('passwords').innerHTML="Please fill the password field";
                    return false;
                }
                if((pass.length <= 5) || (pass.length > 20)){
                    document.getElementById('passwords').innerHTML="password length must be 2 to 20";
                    return false;
                }
                if(pass!=conpass){
                    document.getElementById('passwords').innerHTML="password do not matching";
                    return false;
                }
                
                if(conpass==""){
                    document.getElementById('confrmpass').innerHTML="Please fill the confirm password field";
                    return false;
                }
                
                if(MobileNumber==""){
                    document.getElementById('mobileno').innerHTML="Please fill the Mobile number field";
                    return false;
                }
                if(isNaN(MobileNumber)){
                    document.getElementById('mobileno').innerHTML="user must write only digits not characters";
                    return false;
                }
                if(MobileNumber.length!=10){
                    document.getElementById('mobileno').innerHTML="Number must be 10 digits only";
                    return false;
                }
                
                if(address==""){
                    document.getElementById('a').innerHTML="Please fill the confirm password field";
                    return false;
                }
                
            }
        
        
        </script>
    </body>
</html>