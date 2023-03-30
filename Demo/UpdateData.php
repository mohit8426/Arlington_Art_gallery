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
	  $stateName = filter_input(INPUT_POST, 'stateName');
  
  
  $query = "UPDATE state SET stateAb = '$stateAb' WHERE stateName = '$stateName'";
if ($conn->query($query)){
	echo '<html>';
	echo '<body bgcolor="add8e6">';
	echo '<h1>Record updated sucessfully.</h1>';
	echo '<form method="get">';
	echo '<button type = "submit" formaction="index.html" > Home Page </button><br>';
	echo '</form>';
	echo '</body>';
	echo '</html>';
}
else{
echo "Error: ". $query ."
". $conn->error;
}
}
?>