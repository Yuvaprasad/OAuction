<!DOCTYPE html>
<?php
session_start();
$db=mysql_connect("localhost","root","");
mysql_select_db("onlineauction",$db);
if($_SESSION["category"]=="")
{
if($_SESSION["itemsearch"]=="")
  $res=mysql_query("select * from itemlist",$db);
else
{
  $res=mysql_query("select * from itemlist where name LIKE '%".$_SESSION["itemsearch"]."%'",$db);
  print("<span style='font-size:30px;' >Showing Result For :<b>&nbsp;".$_SESSION["itemsearch"]."</b><br><br></span>");
}
}
else{
      $res=mysql_query("select * from itemlist where category='".$_SESSION["category"]."'",$db);
      print("<span style='font-size:30px;' >Category :<b>&nbsp;".$_SESSION["category"]."</b><br><br></span>");
}
$_SESSION["category"]="";
?>
<html>
<head>
<style>
.box
{
    width:80%;
    margin-left:7%;
    position:relative;
    z-index:10000;
    height:250px;
    border-radius:20px;
    background-color:#eeeeff;
    padding:20px 20px 20px 20px;
    border:2px solid black;
    box-shadow:2px 5px grey;
}
.box img{
    float:left;
    width:25%;
    height:200px;
    border: 2px dotted green;
    overflow:auto;
}
.boxcontent{
    margin-left:28%;
    height:180px;
    font-size:20px;
}
#button{
    text-align:center;
    font-size:30px;
    color:white;
    width:100px;
    height:100px;
    border-radius:50%;
    margin-right:50px;
    float:right;
}
#button:hover{
    cursor:pointer;
}
</style>
</head>
<body>
<?php 
$counter=0;
while($row=mysql_fetch_row($res,MYSQL_BOTH))
{
if($_SESSION["userid"]!=$row["userid"])
{
$counter+=1;
if(isset($_POST["button".$counter]))
{
    $_SESSION["itemname"]=$_POST["itemname"];
    $_SESSION["itemid"]="item".$_POST["itemid"];
    $dcheck=($row["dd"]+$row["mm"]*31+$row["yyyy"]*365);
    $dcheck1=date('d')+date('m')*31+date('Y')*365;
    if($dcheck==$dcheck1)
     {
        print('<script>window.open("/oauction/webpage/Auction.php");</script>');
      
     }
    else if($dcheck<$dcheck1)
     {
        print("<script>alert('Auction Ended');</script>");
      }
    else
    {
        print("<script>alert('Auction Not Started Yet');</script>");
    }
}
print("<div class='box'>
<img src=".$row["imgsrc"].">
<form method='post' >
<input type='hidden' name='itemname' value='".$row["name"]."'>
<input type='hidden' name='itemid'   value='".$row["itemid"]."'>
<input type='submit' name='button".$counter."' id='button' class='".$counter."' value='Join'>
</form>
<div class='boxcontent'>
<b><span style='font-size:25px;text-align:left;border:1px solid black;padding:5px;'>".$row["name"]."</span></b><br><br>
<b>&nbsp;Description: </b>&nbsp;".$row["description"]."<br>
<b>&nbsp;Seller:</b>&nbsp;".$row["owner"]."<br>
<b>&nbsp;Category:</b>&nbsp;".$row["category"]."<br>
<b>&nbsp;Starting price:</b>&nbsp;Rs.".$row["min"]."<br>
&nbsp;<div style='border:1px solid black;width:55%;'><b><u>Auction Time:</u></b><br><br>
<b>Starts:</b>".$row["dd"]."/".$row["mm"]."/".$row["yyyy"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Status:</b>");

$dcheck=($row["dd"]+$row["mm"]*31+$row["yyyy"]*365);
$dcheck1=date('d')+date('m')*31+date('Y')*365;

if($dcheck==$dcheck1)
{
  $dcolor="#33ff33";
  print("<span id=".$counter." style='color:green;'>Online</span>");
}
else if($dcheck<$dcheck1)
{
  $dcolor="red";
  print("<span id=".$counter." style='color:red;'>Ended</span>");
}
else
{
  $dcolor="orange";
  print("<span id='".$counter."' style='color:orange;'>Not Started</span>");
}
print("<style> [class='".$counter."']{ background-color:".$dcolor."}</style>");
print("</div>
</div>
</div><br><br>");
}
}
if($counter==0)
  print("<br><span style='font-size:30px;'>No Result Found</span>");
?>
</body>
</html>