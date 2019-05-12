<!DOCTYPE html>
<html>
<head>

</head>
<body> 
<style> 
body {
    background-color: rgb(255,255,224);
}
</style>
<?php

// define variables and set to empty values
$amErr = $usernameErr = $passwordErr = $fullnameErr = $mailErr = $eksaminoErr = "";
$am = $username = $password = $fullname = $mail = $eksamino = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["am"])) {
    $amErr = "AM is required";
  } else {
    $am = test_input($_POST["am"]);
    // check if am only numberrs
    if (!preg_match("[0-9]",$am)) {
      $amErr = "Only numbers allowed"; 
    }
  }
  
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if username only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if password only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
      $passwordErr = "Only letters and numbers allowed"; 
    }
  }
  
  if (empty($_POST["fullname"])) {
    $fullnameErr = "Name is required";
  } else {
    $fullname = test_input($_POST["fullname"]);
    // check if password only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
      $fullnameErr = "Only letters allowed"; 
    }
  }
  
  if (empty($_POST["mail"])) {
    $mailErr = "Email is required";
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "Invalid mail format"; 
    }
  }
    
  if (empty($_POST["eksamino"])) {
    $eksaminoErr = "";
  } else {
    $eksamino = test_input($_POST["eksamino"]);
    // check if URL address syntax is valid 
    if (!preg_match("[0-9]",$eksamino)) {
      $eksaminoErr = "Invalid eksamino"; 
    }
  }


}
?>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 50%;
    padding: 6px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>

<h2>Εγγραφή φοιτητών στο Eudoxus</h2>
<p>Παρακαλώ συμπληρώστε τα παρακάτω στοιχεία!!!</p>
<p align="right"><b id="back"><a href="index.php">Πίσω στο λογαριασμό</a></b>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  AM: <input type="text" name="am" value="<?php echo $am;?>">
  <span class="error">* <?php echo $amErr;?></span>
  <br><br>
  UserName: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Name: <input type="text" name="fullname" value="<?php echo $fullname;?>">
  <span class="error">* <?php echo $fullnameErr;?></span>  
  <br><br>
  E-mail: <input type="text" name="mail" value="<?php echo $mail;?>">
  <span class="error">* <?php echo $mailErr;?></span>
  <br><br>
  Eksamino: <input type="text" name="eksamino" value="<?php echo $eksamino;?>">
  <span class="error">*<?php echo $eksaminoErr;?></span>  
  <br><br>
  <input type="submit" name="submit"  value="Submit">  
  <br><br>
</form>

<?php

@$db=mysqli_connect("localhost", "root", "","eudoxus");

if (!$db)
{
   echo "Error: Could not connect to database. Please try again later.";
   exit;
}

//pernaw sth bash mesw insert ta stoixeia eggrafhs tou ka8e xrhsth
$query= "insert into users(am,username,password,fullname,mail,eksamino,credits)
values('$am','$username','$password','$fullname','$mail','$eksamino',30);";
    
$result=$db->query($query);

/* if ($result)
    echo $row = mysqli_affected_rows($db)." users inserted into database."; */

if ($result) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Your data is not valid.";
}
mysqli_close($db);

?>


</body>
</html>