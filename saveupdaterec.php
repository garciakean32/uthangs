<?php
     $conn = mysqli_connect("localhost", "root", "", "staff");
         
     // Check connection
     if($conn === false){
         die("ERROR: Could not connect. "
             . mysqli_connect_error());
     }
     
     $id = $_REQUEST['id'];
     $item =  $_REQUEST['item'];
     $quan = $_REQUEST['quan'];
     $cre = $_REQUEST['cre'];
     $ddate = date('d-m-y H:i:s');

$sql = "UPDATE users SET id=$id, item_name='$item', created_at='$cre', updated_at='$ddate'   WHERE id=$id";
  
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
header("Location:index.php");
?>