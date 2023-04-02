<!DOCTYPE html>
<?php
session_start();
$imgsrc=$_SESSION["imgsrc"]; 
$_SESSION["itemimg"]="thumbnail.png";
?>
<html>
<head><title>Home</title>
<script>
    function profilebox()
    {
        var check=document.getElementById("profiledrop");
        if(check.style.display=="none")
          check.style.display="block";
        else
          check.style.display="none";
    }
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
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
    border-radius: 5px;
    z-index:1;
    right:0;
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
.imgslide{
    position:relative;
    width:calc(100% - 4px);
    left:50%;
    transform:translate(-50%,0);
    height:500px;
    border:2px solid black;
}
.imgslide :hover{
    cursor:pointer;
}
.mySlides{
    position:absolute;
    width:100%;
    z-index:2;
    height:100%;
}
.leftbutton,.rightbutton{
    position:absolute;
    top:45%;
    width:60px;
    background-color:transparent;
    border:2px solid white;
    border-radius:50%;
    font-size:35px;
    color:white;
    height:60px;
    z-index:3;
}
.rightbutton{
    right:20px;
}
.leftbutton{
    left:20px;
}
#categorybox{
    position:relative;
    width:95%;
    height:530px;
    box-shadow: 5px 0px 18px 5px #888888;
    left:3%;
}

#cat1,#cat2,#cat3,#cat4,#cat5,#cat6{
    position:relative;
  width:25%;
  margin-top:30px;
  height:200px;
  float:right;
  margin-left:50px;
  z-index:6;
  margin-right:50px;
  overflow:hidden;
  box-shadow: 3px 0px 8px 3px #888888;
}
#cat1 :hover,#cat2 :hover,#cat3 :hover,#cat4 :hover,#cat5 :hover,#cat6 :hover{
    opacity:0.5;
    cursor:pointer;
}
#catimg,#catimg1{
    width:100%;
    height:100%;
}
#insidecat{
    position:absolute;
    color:white;
    font-size:30px;
    border:2px dashed white;
    opacity:0.5;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}
#insidecat:hover{
    opacity:1;
}
input[type="submit"]
{
    position:absolute;
    width:100%;
    height:100%;
}
#catimg1{
    background-image:url('/oauction/profile/Crazy_road_legal_vehicles_trans_NvBQzQNjv4BqnntzVh6i2V8vnWmVeYqabhk1mDTumCeH_NeArSD702I.jpg');
    background-repeat:no-repeat;
    background-size:100% 100%;
}
#catimg2{
    background-image:url('/oauction/profile/hotel_furniture_thumb.jpg');
    position:absolute;
    background-repeat:no-repeat;
    background-size:100% 100%;
}
#catimg3{
    background-image:url('/oauction/profile/final_cb_0086.0.jpg');
    background-repeat:no-repeat;
    background-size:100% 100%;
}
#catimg4{
    background-image:url('/oauction/profile/Power-Rangers-toys.jpg');
    background-repeat:no-repeat;
    background-size:100% 100%;
}
#catimg5{
    background-image:url('/oauction/profile/fashion123.jpg');
    background-repeat:no-repeat;
    background-size:100% 100%;
}
#catimg6{
    background-image:url('/oauction/profile/top-7-books-that-changed-the-world.jpg');
    background-repeat:no-repeat;
    background-size:100% 100%;
}
</style>
</head>
<body>
<ul>
   <li><img src=<?php print("'".$imgsrc."'"); ?> width=50 height=50 onclick="profilebox()"></li>
   <li><a href="/oauction/webpage/contact.php">CONTACT US</a></li>
   <li><a href="/oauction/webpage/sell.php">SELL</a></li>
   <li><a href="/oauction/webpage/buy.php">BUY</a></li>
   <li><a class="active" href="/oauction/webpage/home.php">HOME</a></li>
   <li><img id="logo" src="\oauction\profile\logo.png" width=50 height=50></li>
</ul>

<div id="profiledrop" style="display:none">
    <ul>
    <li><a href="/oauction/webpage/profile.php">Profile</a></li>
    <li><a href="/oauction/webpage/login.php">LogOut</a></li>
    </ul>
</div>
<div class="imgslide">
  <img class="mySlides" src="\oauction\profile\bigstock-online-auction-written-on-a-wo-110766977.jpg" onclick="window.location.href='/oauction/webpage/home.php';" style="width:100%">
  <img class="mySlides" src="\oauction\profile\bid.jpeg" style="width:100%" onclick="window.location.href='/oauction/webpage/buy.php';">
  <img class="mySlides" src="\oauction\profile\sell-products-online-successfully-800x400.jpg" style="width:100%" onclick="window.location.href='/oauction/webpage/sell.php';">

  <button class="leftbutton" onclick="plusDivs(-1)">&#10094;</button>
  <button class="rightbutton" onclick="plusDivs(1)">&#10095;</button>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<br><br>
<div id="categorybox">
<b style="font-size:30px;margin-left:20px;">Category</b><br>
<?php
if(isset($_POST["submit"]))
{
    $_SESSION["category"]=$_POST["catval"];    
    print("<script>window.location.href='/oauction/webpage/buy.php';</script>");
} 
?>
<form method="post">
<input type="hidden" name="catval" value="Vehicles">
<span id="cat1"><input type="submit" id="catimg1" name="submit" value="" src="\oauction\profile\Crazy_road_legal_vehicles_trans_NvBQzQNjv4BqnntzVh6i2V8vnWmVeYqabhk1mDTumCeH_NeArSD702I.jpg">
<span id="insidecat">Vehicles</span></span>
</form>

<form method="post">
<input type="hidden" name="catval" value="Furniture">
<span id="cat2" ><input type="submit"  id="catimg2" name="submit" value="" src="\oauction\profile\hotel_furniture_thumb.jpg"><span id="insidecat">Furnitures</span></span>
</form>

<form method="post">
<input type="hidden" name="catval" value="Gadgets">
<span id="cat3" ><input type="submit"  id="catimg3" name="submit" value="" src="\oauction\profile\final_cb_0086.0.jpg"><span id="insidecat">Gadgets</span></span><br>
</form>

<form method="post">
<input type="hidden" name="catval" value="Entertainments">
<span id="cat4" ><input type="submit"  id="catimg4" name="submit" value="" src="\oauction\profile\Power-Rangers-toys.jpg"><span id="insidecat">Entertainments</span></span>
</form>

<form method="post">
<input type="hidden" name="catval" value="Fashion">
<span id="cat5" ><input type="submit"  id="catimg5" name="submit" value="" src="\oauction\profile\fashion123.jpg"><span id="insidecat">Fashion</span></span>
</form>

<form method="post">
<input type="hidden" name="catval" value="Books">
<span id="cat6" ><input type="submit"  id="catimg6" name="submit" value="" src="\oauction\profile\top-7-books-that-changed-the-world.jpg"><span id="insidecat">Books</span></span>
</form>

</div>
<br><br>
</body>
</html>
