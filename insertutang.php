
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
        $name =  $_REQUEST["item"];
        $debtor_id = $_REQUEST["id"];

        $item_id = array_search($name, $items);

        $q = $_REQUEST["quantity"];
        $debtor = $_REQUEST['bname'];
        $ddate = date("Y/m/d");
        // Performing insert query execution
        $sql = "INSERT INTO uthangs (d_id, item_id, quantity, added_on) VALUES ('$debtor_id', '$item_id', '$q', '$ddate');";
        $result = $conn->query($sql);
       
        $text = "Added new item $name x $q to $debtor";
        $sql2 = "INSERT INTO history (transaction, d_id, date) VALUES ('$text', '$debtor_id', '$ddate')";
        $result1 = $conn->query($sql2);



       
         

        
        // Close connection
        mysqli_close($conn);
       
       
        header("Location: HomePage.php");
        die();
        ?>