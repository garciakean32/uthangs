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


 $id = $_REQUEST["id"];

$sql1 = "SELECT * FROM debtors WHERE d_id = $id;";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();


$name = $row['d_name'];
$ddate = date("Y/m/d");
// sql to delete a record
$text = "Removed $name";
  $sql2 = "INSERT INTO history (transaction, d_id, date) VALUES ('$text',
  '$id', '$ddate');";
  $result1 = $conn->query($sql2);

$sql = "DELETE FROM debtors WHERE d_id=$id;";
$sql3 = "DELETE FROM uthangs WHERE d_id=$id;";



if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  $result3 = $conn->query($sql3);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location:HomePage.php");
?>
