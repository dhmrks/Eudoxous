<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>ΕΥΔΟΞΟΣ</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br><br><br><br>
<input name="submit" type="submit" value=" Login ">
<br><br><br><br>
<span><?php echo $error; ?></span>
<p align="center"><b id="books"><a href="eggrafh.php">Δημιουργία λογαριασμού</a></b></p>
</form>
</div>
</div>
</body>
</html>