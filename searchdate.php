<!DOCTYPE html>
<html>

<head>
  <title>Transactions</title>
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
    <div class="head-text">Transactions    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>
    <div class="head-text">Search date Range</div>
    <form class="search-container" action="searchdate.php" method="GET">
    
      <input class="search-input1" type="text" name="from" placeholder="From YYYY-MM-DD">
      <input class="search-input" type="text" name="to" placeholder="To YYYY-MM-DD">
      <button class="search-btn" type="submit">Search</button>
    </form>
    <div class="add-and-transactions-container">
      
    </div>
  </div>
  <div class="customer-box-lists-container">

  <table class="table-container1">
        <div>

          <th class="transaction-th1">Id</th>
          <th class="transaction-th1">Transaction Desciption</th>
          <th class="transaction-th1">Date</th>

  </div>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");
        $datefrom = $_REQUEST["from"];
        $dateto = $_REQUEST["to"];
        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }
        $sql = "SELECT h_id, transaction, name, date FROM history WHERE date BETWEEN '$datefrom' AND '$dateto' ORDER BY h_id DESC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb-transac1'>
              <!-- items -->
              <td>" . $row["h_id"] . "</td>
              <!-- quantity -->
              <td>" . $row["transaction"] . "</td>
              <!-- debtor -->
              <td>" . $row["name"] . "</td>
              <!-- price -->
              <td>" . $row["date"] . "</input></td></tr>";
}
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table>
  </div>

</body>

</html>