<!DOCTYPE html>
<html>

<head>
    <title>Items Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
</head>

<body>
    <div class="top-bar-container">
        <a href="HomePage.php" style="text-decoration:none"><b>Uthangs</b></a>
        <div style="display: flex;">
            <a href= 'HomePage.php' class="top-bar-btn" style="text-decoration:none">Home</a>
            <a href = 'Items.php' class="top-bar-btn" style="text-decoration:none">Items</a>
            <a href = 'About.php' class="top-bar-btn" style="text-decoration:none">About</a>
            <a href = 'logout.php' class="top-bar-btn" style="text-decoration:none">Log out</a>
        </div>
    </div>
    <div class="h1Class">
        <h1>Item Page</h1>
    </div>
    <div class="container">
        <div class="btn-container-class">
            <button class="clicked" id="btn1" onclick="allbtn()">ALL ITEMS</button>
            <button class="NAVBTN" id="btn2" onclick="goodsbtn()">GOODS</button>
            <button class="NAVBTN" id="btn3" onclick="powderbtn()">POWDER</button>
            <button class="NAVBTN" id="btn4" onclick="beveragebtn()">BEVERAGE</button>
            <button class="NAVBTN" id="btn5" onclick="clbtn()">CLEANING PRODUCT</button>
            <button class="NAVBTN" id="btn6" onclick="alcoholbtn()">ALCOHOL</button>
        </div>
        <div class="tableContainer" id="all" >
            <div class="table-class">
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</input></td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>


      <div class="tableContainer" id="goods" style="display:none">
            <div class="table-class">
                <h2>GOODS</h2>
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items WHERE category_id = 1;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <!-- quantity -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>


      <div class="tableContainer" id="powder" style="display:none">
            <div class="table-class">
                <h2>POWDER</h2>
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items WHERE category_id = 2;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <!-- quantity -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>


      <div class="tableContainer" id="beverage" style="display:none">
            <div class="table-class">
                <h2>BEVERAGE</h2>
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items WHERE category_id = 3;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <!-- quantity -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>



      <div class="tableContainer" id="cl" style="display:none">
            <div class="table-class">
                <h2>CLEANING PRODUCT</h2>
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items WHERE category_id = 4;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <!-- quantity -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>



      <div class="tableContainer" id="alcohol" style="display:none">
            <div class="table-class">
                <h2>ALCOHOL</h2>
                
        <table class="table-container">
        <tr class="table-head">

          <th>Item Name</th>
          <th>Price</th>

        </tr>

                    <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");

        // Check connection
        if ($conn === false) {
          die("ERROR: Could not connect. "
            . mysqli_connect_error());
        }

        $sql = "SELECT item_name, price FROM items WHERE category_id = 5;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // output data of each row
            echo
              "<tr class='tb transac'>
                        <!-- items -->
                        <!-- quantity -->
                        <td>" . $row["item_name"] . "</td>
                        <!-- price -->
                        <td>₱" . $row["price"] . "</td></tr>";
          }
        } else {
          echo "No Record";
        }
        $conn->close(); ?>
      </table></div></div>
</body>
<script>
    var btn1 = document.getElementById('btn1');
    var all = document.getElementById('all');
    
        var btn2 = document.getElementById('btn2');
        var goods = document.getElementById('goods');

        var btn3 = document.getElementById('btn3');
        var powder = document.getElementById('powder');

        var btn4 = document.getElementById('btn4');
        var beverage = document.getElementById('beverage');

        var btn5 = document.getElementById('btn5');
        var cl = document.getElementById('cl');

        var btn6 = document.getElementById('btn6');
        var alcohol = document.getElementById('alcohol');
    
    function reset(){
        var active = document.getElementsByTagName('button');
        
        for (let i=0; i < active.length; i++){
            active[i].classList.add('NAVBTN');
            active[i].classList.remove('clicked');
        }
    }

    function allbtn(){
        all.style.display = 'flex';
        goods.style.display = 'none';
        powder.style.display = 'none';
        beverage.style.display = 'none';
        cl.style.display = 'none';
        alcohol.style.display = 'none';

        reset();

        btn1.classList.add('clicked');
        btn1.classList.remove('NAVBTN');
        btn1.type ='disabled';

        
        
    }
    function goodsbtn(){

        all.style.display = 'none';
        goods.style.display = 'flex';
        powder.style.display = 'none';
        beverage.style.display = 'none';
        cl.style.display = 'none';
        alcohol.style.display = 'none';

        reset();

        btn2.classList.add('clicked');
        btn2.classList.remove('NAVBTN');
        btn2.type ='disabled';
        
    }
    function powderbtn(){

        all.style.display = 'none';
        goods.style.display = 'none';
        powder.style.display = 'flex';
        beverage.style.display = 'none';
        cl.style.display = 'none';
        alcohol.style.display = 'none';

        reset();

        btn3.classList.add('clicked');
        btn3.classList.remove('NAVBTN');
        btn3.type ='disabled';
        
    }
    function beveragebtn(){

        all.style.display = 'none';
        goods.style.display = 'none';
        powder.style.display = 'none';
        beverage.style.display = 'flex';
        cl.style.display = 'none';
        alcohol.style.display = 'none';

        reset();

        btn4.classList.add('clicked');
        btn4.classList.remove('NAVBTN');
        btn4.type ='disabled';
        
    }
    function clbtn(){

        all.style.display = 'none';
        goods.style.display = 'none';
        powder.style.display = 'none';
        beverage.style.display = 'none';
        cl.style.display = 'flex';
        alcohol.style.display = 'none';

        reset();

        btn5.classList.add('clicked');
        btn5.classList.remove('NAVBTN');
        btn5.type ='disabled';
        
    }
    
    function alcoholbtn(){

        all.style.display = 'none';
        goods.style.display = 'none';
        powder.style.display = 'none';
        beverage.style.display = 'none';
        cl.style.display = 'none';
        alcohol.style.display = 'flex';

        reset();

        btn6.classList.add('clicked');
        btn6.classList.remove('NAVBTN');
        btn6.type ='disabled';
        
    }
</script>

</html>