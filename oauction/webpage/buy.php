<?php
session_start();
$imgsrc=$_SESSION["imgsrc"];
if(isset($_POST["searchbutton"]))
{
    $_SESSION["itemsearch"]=$_POST["searchkey"];
}
?>
<!DOCTYPE html>
<html>
<head><title>Buy</title>
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
margin:0px;
padding:0px;
}
ul {
    list-style-type: none;
    margin: 0;
    margin-right: 0px;
    padding: 0;
    overflow: hidden;
    background-color: #404040;
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
li #logo{
    position:absolute;
    left:0;
    width:150px;
}
#profiledrop
{
    position:absolute;
    background-color:white;
    width:120px;
    border-radius: 5px;
    right:0;
    z-index:5;
}
#profiledrop ul{
    margin:0;
    padding-left:5px;
    border-radius:5px;
    margin-right:15px;
    background-color:white;
}
#profiledrop li a{
   text-align:center;
   color:Black;
}
profiledrop li:hover{
    background-color:aliceblue;
}
#search{
  position:absolute;
  background-color:aliceblue;
  top:8%;
  width:20%;
  height:90%;
  right:0;
  border:none;
  z-index:2;
}
iframe{
    position:absolute;
    z-index:5;
}
#searchbox{
    position:absolute;
    width:70%;
    top:4%;
    height:25px;
    left:15%;
}
#sbutton{
    position:absolute;
    height:25px;
    right:16%;
}
</style>
</head>
<body>

<ul>
   <li><img src=<?php print("'".$imgsrc."'"); ?> width=50 height=50 onclick="profilebox()"></li>
   <li><a href="/oauction/webpage/contact.php">CONTACT US</a></li>
   <li><a href="/oauction/webpage/sell.php">SELL</a></li>
   <li><a class="active" href="/oauction/webpage/buy.php">BUY</a></li>
   <li><a href="/oauction/webpage/home.php">HOME</a></li>
   <li><img id="logo" src="\oauction\profile\logo.png" width=50 height=50></li>
</ul>

<div id="profiledrop" style="display:none;">
    <ul>
    <li><a href="/oauction/webpage/profile.php">Profile</a></li>
    <li><a href="/oauction/webpage/login.php">LogOut</a></li>
    </ul>
</div>
<iframe src="http://localhost/oauction/webpage/itemlist.php" width=80% height=600px></iframe>
<div id="search">
<form method="post">
<input type="text" name="searchkey" id="searchbox" placeholder="search..."><br><br><br>
<input type="submit" name="searchbutton" id="sbutton" value="Search"> 
</form>
</div>
</body>
</html>
