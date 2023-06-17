<?php
     $conn = mysqli_connect("localhost", "root", "", "test_db");
         
     // Check connection
     if($conn === false){
         die("ERROR: Could not connect. "
             . mysqli_connect_error());
     }
     $old = $_REQUEST['oldname'];
     $id = $_REQUEST['bid'];
     $name =  $_REQUEST['bname'];
     $phone = $_REQUEST['phone'];
     $address = $_REQUEST['address'];
     $ddate = date('d-m-y H:i:s');

$sql = "UPDATE debtors SET d_name='$name', phone='$phone', address='$address' WHERE d_id=$id";
  if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


$conn->close();
header("Location:HomePage.php");
?>