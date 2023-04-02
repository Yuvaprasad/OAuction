
<!DOCTYPE html>
<?php
session_start();
$imgsrc=$_SESSION["imgsrc"]; 
$_SESSION["itemimg"]="thumbnail.png";

$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);

if(isset($_POST["submit"]))
{
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];
$phno=$_POST["number"];
$sub=$_POST["sub"];
$message=$_POST["message"];
$userid=$_SESSION["userid"];
$sql="INSERT INTO `onlineauction`.`contact` (`contactId`, `userid`, `firstName`, `lastName`, `mail`, `pho`, `subject`, `message`) VALUES (NULL, '$userid', '$fname', '$lname', '$email', '$phno', '$sub', '$message');";
$res=mysql_query($sql,$db);
if($res)
  print("<script>alert('Thanks')</script>");
}
?>
<html>
<head><title>Contact Us</title>
<script>
    function profilebox()
    {
        var check=document.getElementById("profiledrop");
        if(check.style.display=="none")
          check.style.display="block";
        else
          check.style.display="none";
    }
</script>
<style>
body{

margin:0;
padding:0;
}
ul {
    list-style-type: none;
    margin: 0;
    margin-right: 0px;
    padding: 0;
    overflow: hidden;
    background-color:#404040;
}
li img{
    border-radius: 50%;
    margin-left:10px;
}
li img:hover{
   cursor:pointer;
}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 30px;
    text-decoration: none;
}
li #logo{
    position:absolute;
    left:0;
    width:150px;
}
#profiledrop
{
   width:100px;
   height:100px;
   background-color:white;
}

li a:hover:not(.active) {
    background-color:#a6a6a6;
}

.active {
    border: 1px solid aliceblue;
}
.pic{
position:absolute;
z-index:0;
width:100%;
height:100%;
}
.sd{
position:absolute;
margin:40px 0px 0px 100px;
color:white;
font-style:italic;
}
.ee{
position:absolute;
margin:90px 0px 0px 100px;
color:white;
font-style:italic;
}
.dd{
position:absolute;
margin:150px 0px 0px 100px;
font-style:italic;
color:white;
font-size:1.34em;
}
.ff{
position:absolute;
margin:0px 0px 0px 100px;
}
.df{
position:absolute;
margin:0px 0px 0px 310px;
}
.qf{
position:absolute;
margin:0px 0px 0px 142px;
}
.we{
position:absolute;
margin:0px 0px 0px 262px;
}
.re{
position:absolute;
margin:0px 0px 0px 380px;
}
.he{
position:absolute;
margin:0px 0px 0px 55px;
}
.io{
position:absolute;
margin:0px 0px 0px 123px;
}
.add{
position:absolute;
font-size:20px;
color:white;
padding:5px;
font-style:italic;
background-color:transparent;
}
#profiledrop
{
    position:absolute;
    background-color:white;
    border-radius: 5px;
    right:0;
    z-index:5;
}
#profiledrop ul{
    margin:0;
    background-color:white;
    padding-left:5px;
}
#profiledrop li a{
   color:black;
}
profiledrop li:hover{
    background-color:aliceblue;
}
</style>
</head>
<body>
<ul>
   <li><img src=<?php print("'".$imgsrc."'"); ?> width=50 height=50 onclick="profilebox()"></li>
   <li><a class="active" href="/oauction/webpage/contact.php">CONTACT US</a></li>
   <li><a href="/oauction/webpage/sell.php">SELL</a></li>
   <li><a href="/oauction/webpage/buy.php">BUY</a></li>
   <li><a href="/oauction/webpage/home.php">HOME</a></li>
   <li><img id="logo" src="\oauction\profile\logo.png" width=50 height=50></li>
</ul>

<div id="profiledrop" style="display:none">
    <ul>
    <li><a href="/oauction/webpage/profile.php">Profile</a></li>
    <li><a href="/oauction/webpage/login.php">LogOut</a></li>
    </ul>
</div>
<img class="pic" src="\oauction\profile\green.jpg">
<h1 class="sd">Contact &nbspform</h1>
<h3 class="ee">Please fill your personal feedback</h3>
<form method="post" class="dd">
 Your Name<input type="text" class="ff" placeholder="First Name" name="firstname"><input type="text"  placeholder="Last Name" class="df" name="lastname"><br><br>
 Your Email<input type="email" placeholder="e.g.hello@contact.net" class="ff" size="50" name="email"><br><br>
 Phone<input type="text" placeholder="###" name="number" class="qf" size="50"><br><br>
 Message Subject<input type="text" placeholder="Subject" name="sub" class="he" size="50"><br><br>
 Message<textarea rows="5" cols="52" placeholder="Enter Message...." name="message" class="io"></textarea><br><br><br><br>
 <hr width=600><br>
 <input type="submit" class="add" name="submit" value="Submit Form">
</form>
</body>
</html>
