<?php
     $conn = mysqli_connect("localhost", "root", "", "test_db");
         
     // Check connection
     if($conn === false){
         die("ERROR: Could not connect. "
             . mysqli_connect_error());
     }
     $items = array(
      "Rice", 
      "Egg", 
      "Bread",
      "Powdered Milk",
      "Softdrink",
      "Juice",
      "Coffee",
      "Sugar",
      "Bleach",
      "Soap",
      "Beer"
  );
 
  // Taking all values from the form data(input)
  $item =  $_REQUEST["item"];
  $olditem = $_REQUEST["item1"];
  $oldquan = $_REQUEST["quant2"];
  $debtor = $_REQUEST["debtor"];
  $debtor_id = $_REQUEST["debtorid"];

  $item_id = array_search($item, $items);
     $id = $_REQUEST['id'];
     $quan = $_REQUEST['quant'];
     $ddate = $ddate = date("Y/m/d");

$sql = "UPDATE uthangs SET item_id=$item_id, quantity = $quan, updated_at='$ddate' WHERE u_id=$id";
// UPDATE uthangs SET item_id=$2, quantity = 10, updated_at='2023/06/15' WHERE u_id=23
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  $text = "Edited $olditem x$oldquan to $item x$quan from $debtor";
  $sql2 = "INSERT INTO history (transaction, d_id, name, date) VALUES ('$text',
  '$debtor_id', '$debtor', '$ddate')";
  $result1 = $conn->query($sql2);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
header("Location:HomePage.php");
?>