<!DOCTYPE html>
<html>

<head>
  <title>Home - Uthangs</title>
  <link rel="stylesheet" href="styles.css">
  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
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
    function clearInput() {
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
        <img src="img\profile-logo.png" alt="Profile Logo" class="avatar">
      </div>

      <div class="container">
        <label class="add-label-text" for="input-name">Name</label>
        <input id="id1" class="num" type="text" onfocus="this.value=''" placeholder="Enter Username" name="input-name"
          required>

        <label class="add-label-text" for="input-phone#">Phone Number</label>
        <input id="id2" class="num" onfocus="this.value=''" type="tel" placeholder="Enter Phone#" name="input-phone#"
          onkeypress="return onlyNumberKey(event)" required>

        <label class="add-label-text" for="input-address">Address</label>
        <input id="id3" class="num" type="text" onfocus="this.value=''" placeholder="Enter Address" name="input-address"
          required>

        <div class="cancel-confirm-btn-container">
          <button type="button" onclick="document.getElementById('id01').style.display='none'; clearInput()"
            class="cancel-btn">Cancel</button>
          <button class="confirm-btn" type="submit">Confirm</button>
        </div>
      </div>
    </form>
  </div>
  <div id="transac" class="modal">

    <form name="form1" id="form1" class="modal-content animate" action="Transactions.php" method="post">

      <div class="imgcontainer">
        <span onclick="document.getElementById('transac').style.display='none'; clearInput()" class="close"
          title="Close Modal">&times;</span>
        <label class="label-text" for="input-name">Transactions</label>
      </div>

      <table class="table-container">
        <div>

          <th class="transaction-th">Id</th>
          <th class="transaction-th">Transaction Desciption</th>
          <th class="transaction-th">Date</th>

  </div>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }
        $sql = "SELECT h_id, transaction, date_format((date), '%m/%d/%Y') AS date FROM history ORDER BY h_id DESC LIMIT 10";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb-transac'>
                        <!-- items -->
                        
                        <td>" . $row["h_id"] . "</td>
                        <!-- quantity -->
                        <td>" . $row["transaction"] . "</td>
                        <!-- price -->
                        <td>" . $row["date"] . "</input></td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table>
      <center><button class="confirm-btn" type="submit">More</button></center>
    </form>
  </div>



  <div class="top-bar-container">
    <a href="HomePage.php" style="text-decoration:none"><b>Uthangs</b></a>
    <div style="display: flex;">
            <button class="top-bar-btn" onclick="location.href = 'HomePage.php';">Home</button>
            <button class="top-bar-btn" onclick="location.href = 'Items.php';">Items</button>
            <button class="top-bar-btn" onclick="location.href = 'About.php';">About</button>
            <button class="top-bar-btn" onclick="location.href = 'logout.php';">Log out</button>
        </div>
  </div>
  <div class="listOfDebtors-sub-remove-container">
    <div class="head-text">List of Debtors</div>
    <form class="search-container" action="search.php" method="GET">
      <input class="search-input" type="text" name="search" placeholder="Search Names...">
      <button class="search-btn" type="submit">Search</button>
    </form>
    <div class="add-and-transactions-container">
      <button class="add-and-transactions-btn"
        onclick="document.getElementById('id01').style.display='block'">Add</button>
      <button class="add-and-transactions-btn"
        onclick="document.getElementById('transac').style.display='block'">Transactions</button>
    </div>
  </div>
  <div class="customer-box-lists-container">

    <?php $conn = mysqli_connect("localhost", "root", "", "test_db");

    // Check connection
    if ($conn === false) {
      die("ERROR: Could not connect. "
        . mysqli_connect_error());
    }


    $ddate = date('d-m-y H:i:s');
    //   $sql2 = "SELECT SUM(quantity*price) AS total FROM $row[d_name] JOIN items ON $row[d_name].item_id=items.item_id;";
//   $result2 = $conn->query($sql2);
    $sql = "SELECT d_id, d_name, phone, address, date_format((created_at), '%m/%d/%Y') AS date from debtors;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $name = $row["d_name"];
        $id = $row["d_id"];
        $sql2 = "SELECT SUM(quantity*price) AS total FROM uthangs JOIN items ON uthangs.item_id=items.item_id WHERE d_id = '$id';";
        $result2 = $conn->query($sql2);
        $row1 = $result2->fetch_assoc();

        echo
          "
      <a href='debtorpage.php? &bid=" . $row["d_id"] . " &bname=" . $row["d_name"] . "&address=" . $row["address"] . "&phone=" . $row["phone"] . "&credate=" . $row["date"] . "&tbal=" . $row1["total"] . "' style='text-decoration:none;'>
      <div class='customer-box-lists'>
      
          <img class='profile-logo' src='img\profile-logo.png' alt='Profile Logo'>
          <div>
              <p name ='name' id='name'>Name: " . $row["d_name"] . "</p>
              <p>Date Started: " . $row["date"] . "</p>
              <p>Total Balance: ₱" . $row1["total"] . "</p>
              </div>
           <form class='del-btn-container'action = 'deletedebtor.php' method = 'POST'>
            <input type = 'hidden' name= 'id' value=" . $row["d_id"] . ">
            <button type='submit' class='del-btn' style='text-decoration:none;'> Delete </button>
            </form>
      </div></a>";
      }
    } else {
      echo "No Record";

    }

    $conn->close();
    ?>
  </div>

</body>

</html>