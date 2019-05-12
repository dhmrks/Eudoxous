<html>
<head>
<title>Αντικατάσταση βιβλίων:</title>
</head>
<body>
<form name="books" method="post" action="">
<p><h3>Επιλέξτε ποία βιβλία θέλετε να αντικαταστήσετε:</h3></p>
<p align="right"><b id="back"><a href="index.php">Πίσω στο λογαριασμό</a></b>
<br>
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
<style>
.button {
    background-color: rgb(255,80,80);
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<?php
include('session.php');
$connection = mysqli_connect("localhost", "root", "", "eudoxus");
 
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$error_message = '';
$idbook_u = '';
$idmath = '';
$year = '';
$name = '';
$name_b_of_eksa = '';
$idbook = '';
$name_b = '';
$cre = '';
$less;
$credits=0;
$lesson_array = '';
$book_id_array ='';
$onoma = 'Mathima:';

	$sql1 = "select eksamino,credits,am from users where username = '$login_session'";
	if ($res1= mysqli_query($connection,$sql1)) {
		if(mysqli_num_rows($res1)){
			$row1 = mysqli_fetch_array($res1);
			$eksamino = $row1['eksamino'];
			$credits = $row1['credits'];
			$am = $row1['am'];
		}else {
			$error_message="sql1 wrong";
	} }
	
	$sql5 = "select idbook from users_books where am = '$am'";
			if ($result5 = mysqli_query($connection,$sql5)) {
				$row5 = mysqli_fetch_array($result5);
					for($i = 0 ; $i < (mysqli_num_rows($result5)) ; $i++){
				    $idbook_u[$i] = $row5['idbook'];
					$row5 = mysqli_fetch_array($result5);
					}
			}
	
	
	$sql2 = "select name,idmath from lessons where eksamino = '$eksamino'";
	if ($result2 = mysqli_query($connection,$sql2)) {
		$num_L = mysqli_num_rows($result2);
		if(mysqli_num_rows($result2)>0)
			while($row2 = mysqli_fetch_array($result2)){
		    $name = $row2['name'];
			$idmath = $row2['idmath'];

	echo  "<table>"."<tr>"."<th>"."<li>".$onoma.$name."</li>"."<th>"."</tr>";
					
					
			$sql3 = "select name,idbook,cre,year from books where idmath = '$idmath'";
			if ($result3 = mysqli_query($connection,$sql3)) {
				 $num_B = mysqli_num_rows($result3);
					while($row3 = mysqli_fetch_array($result3)){
				    $name_b = $row3['name'];
					$idbook = $row3['idbook'];
				    $cre = $row3['cre'];
					$year = $row3['year'];
	
 echo "<tr>"."<td>"."<input type='radio' name='".$row2['name']."' value='".$row3['idbook']."'checked=\"checked\"required>".$name_b=$row3['name']."   [" .$row3['year']."]  ----> " .$row3['cre']." Credits <br>"."</td>"."</tr>";
				echo "<br>";
	}}
		} } 
		
			$sql4 = "select name from lessons where eksamino = '$eksamino'";
			if ($result4 = mysqli_query($connection,$sql4)) {
				$row4 = mysqli_fetch_array($result4);
					for($i = 0 ; $i < (mysqli_num_rows($result4)) ; $i++){
				    $name_b_of_eksa[$i] = $row4['name'];
					$row4 = mysqli_fetch_array($result4);
					}
			}
		
	echo "<br><br>";
    echo "<td colspan=\"\" align=\"center\">";
	echo "<tr>"."<th>"."<input class=\"button\" type=\"submit\" name=\"sub_button\" value=\"Submit\">"."</th>";
	echo "</td>"."</table>";
	
	
	//ksanatrexw ta quiria gia na prospelasw apo thn arxh ta stoixeia pou epistrefei
	$result2 = mysqli_query($connection,$sql2);
	$row2 = mysqli_fetch_array($result2);
	
	$result3 = mysqli_query($connection,$sql3);
	$row3 = mysqli_fetch_array($result3);
	
	//-------------------------------------------------------------------------------
				//epistrefw ta credits apo ta palia biblia
			for($i = 0 ; $i < sizeof($idbook_u) ; $i++) {
				$que = "SELECT cre FROM books WHERE idbook = '".$idbook_u[$i]."';";
				$res = mysqli_query($connection,$que);
				$ro = mysqli_fetch_array($res);
			    $credits += $ro['cre'];
			}	
	//------------------------------------------------------------------------------
	if(isset($_POST["sub_button"]))	 {
			for($i = 0 ; $i < sizeof($name_b_of_eksa) ; $i++){
				$less=$name_b_of_eksa[$i];
			    $book_id_array[$i] = $_POST[$less];
			}
			
			mysqli_query($connection, "Delete from users_books where am='".$am."';");
		
		//vriskw sunolo credits twn epilegmenwn vivliwn
	$books_cre=0;
		for($i = 0 ; $i < sizeof($book_id_array) ; $i++) {
			$query = "SELECT cre FROM books WHERE idbook = '".$book_id_array[$i]."';";
			$res = mysqli_query($connection,$query);
			$r = mysqli_fetch_array($res);
		    $books_cre += $r['cre'];
		}
		
	//------------------------------------------------------------------------------------------
	$query_num_books="SELECT * FROM users_books WHERE am='$am';";
	$res_num_books= mysqli_query($connection,$query_num_books);
	$num_of_books=mysqli_num_rows($res_num_books);
	//------------------------------------------------------------------------------------------
		
		mysqli_query($connection, "Delete from users_books where am='".$am."';");
		
		if (($credits >= $books_cre)) {  
		
			for($i = 0 ; $i < sizeof($book_id_array) ; $i++) 
			mysqli_query($connection, "INSERT INTO users_books VALUES ('".$am."','".$book_id_array[$i]."');");
			
		
			//kanei update stous credits tou mathith
			$query="select credits from users WHERE am='".$am."';";
			$res = mysqli_query($connection,$query);
			$row=mysqli_fetch_array($res);
			$current_points = ($credits - $books_cre);
			mysqli_query($connection, "UPDATE users SET credits='".$current_points."' WHERE am='".$am."';");
	
		
				?>
		<script type="text/javascript">
		alert("Selection of books is complete!");
		</script>
		<?php
	}
	else
	{
		if($credits < $books_cre)
		{
			?>
			<script type="text/javascript">
			alert("Not enough credits! Please try different books.");
			</script>
			<?php
		}
		else 
		{
			?>
			<script type="text/javascript">
			alert("We change successfully your choice.");
			</script>
			<?php
		}
	}
	
}		mysqli_close($connection);
?>

</form>
</body> 
</html>

</form>
</body>
</html>