<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Ο λογαριασμός μου</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Καλώς ήρθατε : <i><?php echo $login_session;?></i></b>
<p align="right"><b id="logout"><a href="logout.php">Log Out</a></b>
</div>

<form action="profile.php" method="post">
<div id="content">
<h1>Ο λογαριασμός μου</h1>
<div class="article">
<h2>Τα στοιχεία μου:</h2>

<?php

//create connection
$connection = mysqli_connect("localhost", "root", "", "eudoxus");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//kanw ta katallhla select gia na parw ta stoixeia tou user

$sql = "select * from users where username = '$login_session'";

if ($result = mysqli_query($connection,$sql)) {
    if(mysqli_num_rows($result) > 0){
		echo "<table>";
            echo "<tr>";
                echo "<th>AM</th>";
                echo "<th>Username  </th>";
                echo "<th>password</th>";
				echo "<th>Ονοματεπώνυμο</th>";
                echo "<th>email</th>";
				echo "<th>Εξάμηνο</th>";
				echo "<th>credits</th>";
            echo "</tr>";
			while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			// ta emfanizw sto profile
                echo "<td>" . $row['am'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . "******" . "</td>";
				echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['mail'] . "</td>";
				echo "<td>" . $row['eksamino'] . "</td>";
				$am = $row['am'];
				echo "<td>" . $row['credits'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " ;
}

?>
</div>

<style>
table {
    border-collapse: collapse;
    width: 98%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#f5f5f5}
</style>
<?php
echo "<br><br>";
echo  "<table>"."<tr>"."<th>"."Τα μαθήματα μου:"."<th>"."</tr>";

$sql = "SELECT name FROM lessons WHERE eksamino=
(SELECT eksamino FROM users WHERE am = '$am') ";

if ($result = mysqli_query($connection,$sql)) {
    if(mysqli_num_rows($result) > 0){
		echo "<table>";
			while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>".  $row['name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Δεν βρέθηκαν μαθήμτα.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " ;
	
}

?>
<p align="right"><b id="books"><a href="books.php">Επιλογή συγγραμμάτων</a></b></p>
<p align="right"><b id="anti"><a href="anti.php">Αντικατάσταση συγγραμμάτων</a></b></p>
<?php

echo  "<table>"."<tr>"."<th>"."Τα βιβλία μου:"."<th>"."</tr>";
//emfanizw ta biblia tou ka8e xrhsth pou exei epilexei

$sql = "SELECT name FROM books INNER JOIN users_books ON users_books.idbook=books.idbook
 WHERE users_books.am = '$am' ";

if ($result = mysqli_query($connection,$sql)) {
    if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Δεν βρέθηκαν βιβλία.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " ;
	
	mysqli_close($connection);
}

?>

</form>

</body>
</html>