<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "art gallery";

$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername, $dbpassword);

if(!$conn) {
  die("Connection failed");
}
else{
  $stateAb = filter_input(INPUT_POST, 'stateAb');
  

  $query = "SELECT cID , name , street ,city ,stateAb ,zipcode  FROM CUSTOMER  WHERE stateAb = :stateAb";

  
    if($query==null){
      echo "No Record Available";
      die();
    }

  else{
  $stmt = $conn->prepare($query);
  $stmt->execute(array(':stateAb' => $stateAb));
  $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
}
}
?>

<html>
<center>
<head>
<h1>CUSTOMER DATA FOR ENTERED STATE</h1></br>
</head>
<body>
<style>
		body {
		background-image: url('Art.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		}
</style>
<?php
	echo'<table border=1>';
		echo'<tr>';
			echo '<th>CUSTOMER ID	</th>';
			echo '<th>CUSTOMER NAME	</th>';
			echo '<th>STREET		</th>';
			echo '<th>CITY			</th>';
			echo '<th>STATEAB		</th>';
			echo '<th>ZIPCODE		</th>';
		echo'</tr>';
    foreach ($rows as $row) {
		echo '<tr>';	
			echo '<td>'; echo $row["cID"]; 		echo '</td>';
			echo '<td>'; echo $row["name"];		echo '</td>';
			echo '<td>'; echo $row["street"];	echo '</td>';
			echo '<td>'; echo $row["city"];		echo '</td>';
			echo '<td>'; echo $row["stateAb"];	echo '</td>';
			echo '<td>'; echo $row["zipcode"];	echo '</td>';
		echo '</tr>';	
	}
	echo'</table>';
 ?>
<form method="get">
	<br><center><button type = "submit" formaction="index.html" > Home Page </button></center><br>
</form>
</body>
</center>
</html>

