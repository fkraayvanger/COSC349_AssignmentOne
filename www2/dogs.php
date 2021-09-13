<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
<title>Dog Museum</title>
</head>
<body>
<div class="space">
<div style="padding: 60px; text-align: center;background-color: #FAAFBE; border-color: #FAAFBE;"> 
  <div style="color: #F52887; font-family: Tahoma, sans-serif;"><h1> Dog Museum </h1></div>
  <div style="color: #FF69B4; font-family: Tahoma, sans-serif;"><h2>Admin Site</h2></div>
<div style="color: #FF69B4; font-family: Tahoma, sans-serif;"><h2>Welcome to the Dog Museum</h2></div>
</div>
</div>
</body>
<div class="topnav">
<a class="active" href="index.php">Home</a>
<a class="active" href="dogs.php">Dogs</a>
</div>
<div style="max-width: 500px; height: 600px; background-color: #FAAFBE; margin: auto; border-color:#FAAFBE;">
<body>
<div style="font-family: Tahoma, sans-serif; margin-right: 30px; margin-left: 30px; height 600px; background-color: #FFC0CB; COLOR: #f52887">
<center><h2>Information about Adoptees</h2></center>
</div>
</body>
<center>
<table border="1">
<tr><th>Dog Name</th><th>Dog Price</th><th>Dog Age</th></tr>

<?php
 
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM dog_options");

while($row = $q->fetch()){
echo "<tr><td>".$row["dog_name"]."</td><td>".$row["dog_price"]."</td><td>".$row["dog_age"]."</td></tr>\n";
}

?>
</table>
</center>
<center>
<table border="1">
<tr><th>Dog Name</th><th>Dog Breed</th><th>Dog Sex</th></tr>

<?php

$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM dog_options");

while($row = $q->fetch()){
echo "<tr><td>".$row["dog_name"]."</td><td>".$row["dog_breed"]."</td><td>".$row["dog_sex"]."</td></tr>\n";
}

?>
</table>
</center>
</div>
</html>
<style>
.space {
max-width: 500px;
margin: auto;
text-align: center;
}
.image1{
margin: 10px auto 20px;
display: block;
}
.topnav {
width: 750px;
margin:0 auto;
position: relative;
background-color: #F52887;
overflow: hidden;
border-color: #F52887;
}

.topnav a {
width: 150px;
float: left;
color: #FAAFBE;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

.topnav a:hover {
background-color: #E38AAE;
color: black;
}

.topnav a.active {
background-color: #E38AAE;
color: white;
}
</style>
