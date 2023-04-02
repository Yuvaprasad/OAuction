<!DOCTYPE html>
<?php
session_start();
$imgsrc=$_SESSION["imgsrc"]; 
$_SESSION["itemimg"]="thumbnail.png";

$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);

if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = 'C:\wamp\www\oauction\profile/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                $imgsrc='\oauction\profile\\'.$name;
                $imgsr=addslashes($imgsrc);
                $_SESSION["imgsrc"]=$imgsrc;
                $userids=$_SESSION["userid"];
                $sql="UPDATE  `onlineauction`.`account` SET  `imgsrc` =  '$imgsr' WHERE  `account`.`userid` =  '$userids';";
                $res=mysql_query($sql,$db);
            }
            
        }
    }  else {
        print("<script>alert('File not Supported');</script>");;
    }
}
?>
<html>
<head>
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
    background-color: Black;
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
#profilecontent 
{
    position:absolute;
    background-color:aliceblue;
    width:100%;
    height:80%;
    z-index:0;
}
#profiledrop
{
   width:100px;
   height:100px;
   background-color:white;
   z-index:1;
}

li a:hover:not(.active) {
    background-color:#a6a6a6;
}

.active {
    border: 1px solid aliceblue;
}
#profiledrop
{
    background-color:white;
    border-radius: 5px;
    float:right;
    right:0;
    z-index:1;
}
#profiledrop ul{
    margin:0;
    padding-left:5px;
}
#profiledrop li a{
   color:black;
}
profiledrop li:hover{
    background-color:aliceblue;
}
#profilepic{
    position:absolute;
    top:30%;
    left:50%;
    transform:translate(-50%,-50%);
    border-radius:50%;
    border:2px dashed blue;
}
#imgup{
    position:absolute;
    top:65%;
    left:37%;
}
</style>
</head>
<body>
<ul>
   <li><img src=<?php print("'".$imgsrc."'"); ?> width=50 height=50 onclick="profilebox()"></li>
   <li><a href="/oauction/webpage/contact.php">CONTACT US</a></li>
   <li><a href="/oauction/webpage/sell.php">SELL</a></li>
   <li><a href="/oauction/webpage/buy.php">BUY</a></li>
   <li><a href="/oauction/webpage/home.php">HOME</a></li>
</ul>

<div id="profiledrop" style="display:none">
    <ul>
    <li><a href="/oauction/webpage/sell.php">Profile</a></li>
    <li><a href="#logout">LogOut</a></li>
    </ul>
</div>
<div id="profilecontent">
<img id="profilepic"src=<?php print("'".$imgsrc."'"); ?> width=300 height=300> 
<form  id="imgup" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="fileToUpload"><br>
    <input type="submit" value="Upload" name="submit">
</form>
</div>
</body>
</html>
