<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


function onlyNumberKey(evt) {
             
             // Only ASCII character in that range allowed
             var ASCIICode = (evt.which) ? evt.which : evt.keyCode
             if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                 return false;
             return true;
         }
function clearInput(){
      document.getElementById('id1').value = "";
      document.getElementById('id2').value = "";
      document.getElementById('id3').value = "";

 }

</script>
 
</head>
<body>



<div id="id01" class="modal">

        <form name="form1" id="form1" class="modal-content animate" action="insertdebtor.php" method="post">
        
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'; clearInput()" class="close" title="Close Modal">&times;</span>
                <img src="img\profile-logo.png" alt="Profile Logo" class="avatar">
            </div>

            <div class="container">
                <label class="label-text" for="input-name" onkeypress="return AvoidSpace(event)">Name</label>
                <input id="id1" type="text" onfocus="this.value=''" placeholder="Enter Username" name="input-name" onkeypress="return AvoidSpace(event)" required>

                <label class="label-text" for="input-phone#">Phone Number</label>
                <input id="id2" class="num" onfocus="this.value=''" type="tel" placeholder="Enter Phone#" name="input-phone#" onkeypress="return onlyNumberKey(event)" required>

                <label class="label-text" for="input-address">Address</label>
                <input id="id3" type="text" onfocus="this.value=''" placeholder="Enter Address" name="input-address" required>

                <div class="cancel-confirm-btn-container">
                <button type="button" onclick="document.getElementById('id01').style.display='none'; clearInput()" class="cancel-btn">Cancel</button>
                    <button class="confirm-btn" type="submit">Confirm</button>
                </div>
            </div>
        </form>
    </div>



    <div class="top-bar-container">
        <a href="HomePage.php" style="text-decoration:none"><b>Uthangs</b></a>
        <div style="display: flex;">
            <button class="top-bar-btn" onclick="location.href = 'HomePage.php';">Home</button>
            <button class="top-bar-btn" onclick="location.href = 'About.php';">About</button>
            <button class="top-bar-btn" onclick="location.href = 'logout.php';">Log out</button>
        </div>
    </div>
    <div class="listOfDebtors-sub-remove-container">
        <div class="head-text">List of Debtors</div>
        <input class="search" id="search" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <button class="add-btn" onclick="document.getElementById('id01').style.display='block'">Add</button>
    </div>
    <div class="customer-box-lists-container">

    <?php $conn = mysqli_connect("localhost", "root", "", "test_db");
  
  // Check connection
  if($conn === false){
	  die("ERROR: Could not connect. "
		  . mysqli_connect_error());
  }

  
  $ddate = date('d-m-y H:i:s');
//   $sql2 = "SELECT SUM(quantity*price) AS total FROM $row[d_name] JOIN items ON $row[d_name].item_id=items.item_id;";
//   $result2 = $conn->query($sql2);
  $sql = "SELECT d_id, d_name, phone, address, date_format((created_at), '%m/%d/%Y') AS date from debtors;";
  $result = $conn->query($sql);
  
  
  if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $name = $row["d_name"];
        $sql2 = "SELECT SUM(quantity*price) AS total FROM uthangs JOIN items ON uthangs.item_id=items.item_id WHERE debtor = '$name';";
        $result2 = $conn->query($sql2);
        
	  echo "
      <ul id='mul'>
        <li>
      <div class='customer-box-lists' id='box'>
          <img class='profile-logo' src='img\profile-logo.png' alt='Profile Logo'>
          <div>
              <p name ='name' id='name'>Name: ". $row["d_name"]."</p>
              <p>Date Started: ". $row["date"]."</p>";
              while($row1 = $result2->fetch_assoc()) {
                echo "<p>Total Balance: ". $row1["total"]."</p>
                </div><a href='debtorpage.php? &bid=".$row["d_id"]." &bname=".$row["d_name"]."&address=".$row["address"]."&phone=".$row["phone"]. "&credate=" .$row["date"]. "&tbal=" . $row1["total"]."' class='confirm-btn' style='text-decoration:none;'>Edit</a>
                <a href=deletedebtor.php?bid=" .$row["d_id"]. " &bname=".$row["d_name"]." ' class='confirm-btn' style='text-decoration:none;'>Delete </a> </li>
      </div> </ul>";}
	 }
  } else {
	echo "No Record";
	$sql1 = "TRUNCATE TABLE debtors";
  	$result = $conn->query($sql1);
  }
  $conn->close();
 
 
 ?>
    </div>

        
</body>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  
  filter = input.value.toUpperCase();
  table = document.getElementById("mul");
  tr = table.getElementsByTagName("li");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("div")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</html>