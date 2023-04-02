<?php
session_start();
$name=$_SESSION["name"];
$itemid=addslashes($_SESSION["itemid"]);
echo "$name";
$db=mysql_connect("localhost","root","");
if(!mysql_select_db("auctionchat",$db))
 print("oops");
else
{
 $hi="yuva";
 //$sql="INSERT INTO $itemid (`sno`, `name`, `userid`, `amount`, `time`) VALUES (NULL, 'yuva' , 'yuva2' , '10000' ,NOW());";
 //$sql="INSERT INTO `auctionchat`.`yuva` (`sno`, `name`, `userid`, `amount`, `time`) VALUES (NULL, 'yuva', 'yuva1', '1000', NOW());";
 $sql="create table item4 (sno int PRIMARY KEY AUTO_INCREMENT,name varchar(64) NOT NULL,userid varchar(64) NOT NULL,amount int NOT NULL,time varchar(32) NOT NULL);";
 $res=mysql_query($sql,$db); 
}
 if($res)
   echo"sucess";
 else
   echo"$itemid";
?>