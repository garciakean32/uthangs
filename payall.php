<?php
 
 // servername => localhost
 // username => root
 // password => empty
 // database name => staff
 $conn = mysqli_connect("localhost", "root", "", "test_db");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
 // Taking all 5 values from the form data(input)


// sql to delete a record
$bname = $_REQUEST["bname"];
$total = $_REQUEST["total"];
$id = $_REQUEST["id"];
$ddate = date("Y/m/d");

$sql = "DELETE FROM uthangs WHERE d_id = '$id';";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  $text = "Paid Full Balance of ₱$total from $bname";
  $sql2 = "INSERT INTO history (transaction, d_id, name, date) VALUES ('$text',
  '$id', '$bname', '$ddate')";
  $result1 = $conn->query($sql2);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location:HomePage.php");
?>
