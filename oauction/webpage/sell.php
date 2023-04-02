<?php 
session_start();
$imgsrc=$_SESSION["imgsrc"];
$name=$_SESSION['itemimg'];
if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $_SESSION['itemimg']=$name;
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = 'C:\wamp\www\oauction\images/';      
            if(move_uploaded_file($temp_name, $location.$name)){
            }
            
        }
    }  else {
        print("<script>alert('File not Supported');</script>");;
    }
}
?>
<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);

if(isset($_POST['post']))
{
    if(! get_magic_quotes_gpc() ) {
     $imgsrc=addslashes("'\oauction\images\\".$name."'");
     $itemname=addslashes($_POST['itemname']);
     $itemdesc=addslashes($_POST['itemdesc']);
     $owner=addslashes($_SESSION['name']);
     $userid=$_SESSION["userid"];
     $dd=addslashes($_POST['dd']);
     $mm=addslashes($_POST['mm']);
     $yyyy=addslashes($_POST['yyyy']);
     $mina=addslashes($_POST['minamount']);
     $category=addslashes($_POST['category']);
    }
 $res=mysql_query("INSERT INTO `onlineauction`.`itemlist` (`itemid`, `userid`,`imgsrc`, `name`, `description`, `owner`, `dd`, `mm`, `yyyy`, `min`, `category`) VALUES (NULL,'$userid' ,'$imgsrc', '$itemname','$itemdesc','$owner',$dd,$mm,$yyyy,$mina,'$category');",$db);
 if($res)
 {
   print("<script>alert('Item Posted SuccessFully');</script>");
   $res=mysql_query("select * from itemlist;");
   while(($temp=mysql_fetch_row($res,MYSQL_BOTH)))
   {
       $row=$temp;
   }
   mysql_select_db("auctionchat",$db);
   $sql="create table item".$row["itemid"]." (sno int PRIMARY KEY AUTO_INCREMENT,name varchar(64) NOT NULL,userid varchar(64) NOT NULL,amount int NOT NULL,time varchar(32) NOT NULL);";
   $re=mysql_query($sql,$db);
 }

}
?>

<!DOCTYPE html>
<html>
<head><title>sell</title>
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
#Auctiondetail{
    position:absolute;
    width:30%;
    height:90%;
    right:0;
    z-index:0;
    background-color:#e6e6e6;
    border: 4px double green;
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
    z-index:1;
    right:0;
    border-radius: 5px;
    float:right;
}
#profiledrop ul{
    margin:0;
    padding-left:0px;
    border-radius:5px;
    margin-right:0px;
    background-color:white;
}
#profiledrop li a{
   text-align:center;
   color:black;
}
profiledrop li:hover{
    background-color:aliceblue;
}
#sellbox 
{
    position:absolute;
    width:70%;
    height:90%;
    background-color:white;
    background: linear-gradient(#ffffff, #e6ffff);
    border: 4px double grey;
}

#itempic{
    position:absolute;
    top:10%;
    left:10%;
    width:40%;
    height:50%;
    border:2px solid blue;
}
#imgup{
    position:absolute;
    top:65%;
    left:10%;
}
#itemdetail{
    position:absolute;
    right:20%;
    top:10%;
}
#itemname,#category,#minamount{
    width:200px;
    height:30px;
}
#submit{
    width:100px;
    border-radius:15%;
    box-shadow:2px 2px grey;
}
#submit:hover{
    cursor:pointer;
}
#Auctiondetail{
    overflow:scroll;
    background-image:linear-gradient(90deg, #f2f2f2, #dddddd);
}
#auclist{
    background-color:white;
    width:80%;
    height:50px;
    margin-left:20px;
    border: 2px double grey;
    font-size:25px;
    text-align:center;
    opacity:0.5;
    border-radius:15px 35px;
}
#auclist:hover{
    cursor:pointer;
}
</style>
</head>
<body>

<ul>
   <li><img src=<?php print("'".$imgsrc."'"); ?> width=50 height=50 onclick="profilebox()"></li>
   <li><a href="/oauction/webpage/contact.php">CONTACT US</a></li>
   <li><a class="active" href="/oauction/webpage/sell.php">SELL</a></li>
   <li><a href="/oauction/webpage/buy.php">BUY</a></li>
   <li><a href="/oauction/webpage/home.php">HOME</a></li>
   <li><img id="logo" src="\oauction\profile\logo.png" width=50 height=50></li>
</ul>

<div id="profiledrop" style="display:none;">
    <ul>
    <li><a href="/oauction/webpage/profile.php">Profile</a></li>
    <li><a href="/oauction/webpage/login.php">LogOut</a></li>
    </ul>
</div>
<div id="sellbox">
  <img id="itempic" src=<?php print("'\oauction\images\\".$name."'");?> >
  <form  id="imgup" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="fileToUpload"><br>
    <input type="submit" value="Upload" name="submit">
</form>
<form id="itemdetail" method="post">
    <span style="border: 3px dashed skyblue;font-size:30px;padding:5px;">Item Details:</span><br><br>
    <input id="itemname" type="text" name="itemname" placeholder="Item Name" required><br><br><br>
    <textarea name="itemdesc"style="width:100%; height:100px;" placeholder="Item Description"></textarea><br><br><br>
    <select id="category" name="category" required>
    <option value="Gadgets">Gadgets</option>
    <option value="Vehicles">Vehicles</option>
    <option value="Books">Books</option>
    <option value="Fashion">Fashion</option>
    <option value="Furniture">Furnitures</option>
    <option value="Entertainments">Entertainments</option>
    </select>
    <br><br><br>
    <input id="minamount" type="number" name="minamount" placeholder="Minimum Amount" required><br><br>
    Action Date:<br>
    <input type="number" name="dd" placeholder="dd" style="width:40px">
    <input type="number" name="mm" placeholder="mm" style="width:40px">
    <input type="number" name="yyyy" placeholder="yyyy" style="width:60px"><br><br>
    <input id="submit" type="submit" name="post" value="Post" style="font-size:20px;padding:10px;">
</form>
</div>
<div id="Auctiondetail">
    <span style="font-size:30px;"><u>Your Auction List:</u></span><br><br>
<?php
$sql="select * from itemlist where userid='".$_SESSION["userid"]."'";
$res=mysql_query($sql,$db);
$counter=0;
while($row=mysql_fetch_row($res,MYSQL_BOTH))
{
   $counter+=1;
   if(isset($_POST["list".$counter]))
   {
      $_SESSION["auctionid"]=$_POST["auctionid"];
      print("<script>window.location.href='/oauction/webpage/auctionresult.php'</script>");
   }
    print("<form method='post'>
     <input type='hidden' name='auctionid' value='item".$row["itemid"]."'>
     <input id='auclist' type='submit' name='list".$counter."' value='".$row["name"]."'> </form><br><br>");
}
?>
</div>
</body>
</html>