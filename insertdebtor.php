
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
        $name =  $_REQUEST["input-name"];
        $num = $_REQUEST["input-phone#"];
        $address =  $_REQUEST["input-address"];
        $ddate = date("Y/m/d");
        // Performing insert query execution
        // here our table name is debtors
        $sql = "INSERT INTO debtors (d_name, phone, address, created_at)   VALUES ('$name', '$num', '$address', '$ddate')";
        $result = $conn->query($sql);

        
        $text = "Created new debtor $name";
        $sql1 = "SELECT * FROM debtors WHERE d_name = '$name';";
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();

        $id = $row['d_id'];

        $sql2 = "INSERT INTO history (transaction, d_id, name, date) VALUES ('$text', $id, '$name', '$ddate')";
        $result2 = $conn->query($sql2);




       
         

        
        // Close connection
        mysqli_close($conn);
       
       
        header("Location: HomePage.php");
        die();
        ?>