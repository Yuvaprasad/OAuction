<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);
session_start();
if(isset($_POST['submit']))
{
  $emailid=addslashes($_POST['email']);
  $pass=addslashes($_POST['password']);
  $sql="select * from account where email='".$emailid."' and password='".$pass."';";
  $res=mysql_query($sql,$db);
  if(mysql_num_rows($res)>=1)
  {
    $_SESSION["mail"]=$emailid;
    $row=mysql_fetch_row($res,MYSQL_BOTH);
    $_SESSION["name"]=$row["name"];
    $_SESSION["imgsrc"]=$row["imgsrc"];
    $_SESSION["userid"]=$row["userid"];
    $_SESSION["itemsearch"]="";
    $_SESSION["category"]="";
     print("<script>window.location.href='/oauction/webpage/home.php'</script>");
  }
  else
    print("<script>alert('Wrong Email and Password');</script>");
}
?>


<html>
<head>
<title>Log In</title>
<script>
function show()
{
var eye=document.getElementById("eye");
var eye1=document.getElementById("eye1");
var pass=document.getElementById("pass");

if(eye.style.display=="none")
 {
  eye.style.display="block";
  eye1.style.display="none"; 
  pass.type="password";
 }
else
 {
  eye1.style.display="block";
  eye.style.display="none"; 
  pass.type="text";
 }
}
</script>
<style>
body
{
background-color:white;
margin:0px 0px 0px 0px;
}
body
{
position:relative;
}
#box
{
top:50%;
left:50%;
transform:translate(-50%,-50%);
width:400px;
height:400px;
background-color:rgba(250,250,250,0.7);
border-radius:10%;
position:absolute;
text-align:center;
}
h1
{
font-size:50px;
color:#0f5;
font-family:"Comic Sans MS", cursive, sans-serif;
}

#button
{
border-radius:25%;
font-size:22px;
background-color:#0f5;
color:white;
width:20%;
height:10%
}
#button:hover
{
background-color:#0f9;
}
input[type="text"],input[type="password"]
{
border:none;
border-bottom:2px solid grey;
padding:10px 35px 0px 10px;
background:transparent;
outline:none; 
font-size:17px;
width:60%;
height:10%
}
a
{
  color:Blue;
 bottom:10%;
}
#tex
{
color:Black;
font-size:20px;
margin-right:35%;
}
a:hover
{
color:#ff8888;
}
i
{
position:absolute;
top:57%;
left:72%;
}
#eye1
{
  color:#06f;
}
i:hover{
    cursor:pointer;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<img src="\oauction\profile\hands-typing.jpeg" width=100% height=100%>
<div id="box">
<h1>Log in</h1>
 <div id="errormsg"><div>
 <form method="post">
  <h3><span id="tex">Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><input type="text" name="email" placeholder="Email "><br/>
  <span id="tex">Password :</span><br/><input type="password" name="password" id="pass" placeholder="Password  "><br/>
  <i class="fa fa-eye-slash" id="eye" style="font-size:30px;" onclick="show()"></i>
  <i class="fa fa-eye" id="eye1" style="font-size:30px;display:none" onclick="show()"></i>
  </h3>
  <input id="button" type="submit" name="submit" value="Log In">
   <br><br><a href="/oauction/webpage/register.php">Register Now?</a>
 </form>
</body>
</html>