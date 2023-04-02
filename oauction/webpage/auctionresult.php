<?php 
session_start();
$db=mysql_connect("localhost","root","");
mysql_select_db("auctionchat",$db);
$res=mysql_query("select * from ".$_SESSION["auctionid"]." ORDER BY amount DESC",$db);
if(!$res)
  echo "oops";
?>
<!DOCTYPE Html>
<html>
<head><title> Auction Result</title>
<style>
body{
background-color:e6e6e6;
background-image:linear-gradient(90deg, #f2f2f2, #999999);
}
table{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    border-collapse: collapse;
    text-align:center;
    font-size:23px;
}
tr{
    Background-color:white;
}
#tablehead{
    position:relative;
    background-color:#222222;
    color:white;
}
th{
    padding:5px 10px 5px 10px;
}
td{
    padding:3px 10px 3px 10px;
}
</style>
</head>
<body>
<table>
<tr id="tablehead">
<th>Sno.</th>
<th>Name</th>
<th>UserID</th>
<th>Amount</th>
<th>Email</th>
<th>Mobile No.</th>
<th>Address</th>
</tr>
<?php

for($counter=1;$row=mysql_fetch_row($res,MYSQL_BOTH);$counter+=1)
{
    print("<tr><td>".$counter."</td>");
    print("<td>".$row['name']."</td>");
    print("<td>".$row['userid']."</td>");
    print("<td>".$row['amount']."</td>");

    mysql_select_db("onlineauction",$db);
    $res1=mysql_query("select * from account where userid='".$row['userid']."'",$db);
    $row1=mysql_fetch_row($res1,MYSQL_BOTH);
    
    print("<td>".$row1['email']."</td>");
    print("<td>".$row1['mobileno']."</td>");
    print("<td style='max-width:5px;'>".$row1['address']."</td>");
    print("</tr>");
    
}
?>
</table>
</body>
</html>