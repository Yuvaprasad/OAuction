<!DOCTYPE html>
<?php
session_start();
$db=mysql_connect("localhost","root","");
if(!mysql_select_db("auctionchat",$db))
 print("oops");
else
 $res=mysql_query("select * from ".$_SESSION["itemid"],$db);
$itemid=$_SESSION["itemid"]; 
 mysql_close($db);
?>
<html>
<head>
    <style>
        #message{
            background-color:#eeeeff;
            margin:10px;
            padding:10px;
            float:right;
            border-radius:15px;
        }
    </style>
</head>
<body>
<?php
while($row=mysql_fetch_row($res,MYSQL_BOTH))
{
  print("<div id='message' style='text-align:right'>
         <b>".$row["name"]."</b>&nbsp;&nbsp;".$row["time"]."<br><hr width=100% style='margin:1px;'>
         Amount:".$row["amount"]."
         </div><br><br><br><br><br>");  
}
?>
</body>
</html>