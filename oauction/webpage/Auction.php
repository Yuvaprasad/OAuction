<!DOCTYPE html>
<?php
session_start();
$db=mysql_connect("localhost","root","");
if(!mysql_select_db("auctionchat",$db))
 print("oops");
 $itemid=$_SESSION["itemid"];
?>
<?php

if(isset($_POST['button']))
{
  if($_POST['amount']!='');
    {
        if(! get_magic_quotes_gpc() ) {
            $name = addslashes ($_SESSION["name"]);
            $userid=addslashes($_SESSION["userid"]);
            $amount= addslashes ($_POST['amount']);
         }else {
            $name = "yuva";
            $userid=$_SESSION["userid"];
            $amount = $_POST['amount'];
         }
        $sql="INSERT INTO $itemid (`sno`, `name`, `userid`, `amount`, `time`) VALUES (NULL,'$name','$userid','$amount',NOW());";
        $ins=mysql_query($sql,$db);
        if(!$ins)
          print("<script>alert('".$itemid."');</script>");
    }
}

?>
<html>
<head><title>Auction</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        margin:0;
        background-color:white;
    }
    #chatbox{
        
        position:absolute;
        width:450px;
        height:90%;
        left:50%;
        top:50%;
        transform:translate(-50%,-50%);
        border: 5px double grey;
        background-color:white;
        box-shadow: 5px 5px skyblue;
    }
    #heading{
        position:absolute;
        width:100%;
        height:10%;
        background-color:#0099ff;
        border: 2px solid black;
        border-style:none none solid none;
    }
    iframe
    {
       position:absolute; 
       top:13%;
       width:100%;
       height:450px;
       border:none;
    }
    #send 
    {
        position:absolute;
        bottom:0;
        width:100%;
        height:10%;
        background-color:#eeeeee;
    }
    #input 
    {
        border:none;
        background-color:transparent;
        outline:none;
        margin-top:2px;
        margin-left:10px;
        height:50%;
        width:70%;
        font-size:22px;
        padding-left:20px;
        border-bottom:1px solid black;
    }
    #button 
    {
        margin-left:5%;
        background-color:#0099ff;
        border:1px solid #00ff00;
        border-radius:15%;
        margin-top:2%;
        font-size:25px;
    }
</style>
</head>
<body>
<div id="chatbox">
    <div id="heading">
        <span style="font-size:30px;color:white;margin-left:10px;"><?php print($_SESSION["itemname"]."'S Auction");?></span>
        <span style="float:right"  onclick="history.back()"><i class="fa fa-arrow-circle-left" style="font-size:40px;transform:translate(-50%,30%);"></i></span>
    </div>
        <iframe src="http://localhost/oauction/webpage/auctionchat.php" ></iframe>
    <div id="send">
        <form method="post" action="/oauction/webpage/Auction.php">
        <input type="number" name="amount" id="input"> <input type="submit" name="button" id="button" value="send"> 
        </form>
    </div>
</div>
</body>
</html>