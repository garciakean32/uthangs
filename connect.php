<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'test_db');
 
  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if(! $conn ) {
    echo 'ERROR CONNECTING' . "<br>";
    //connecting database
  }
   
  try{
    $link = mysqli_select_db($conn, DB_NAME);
    if (!$link){
      echo 'Error';
      $sql = "CREATE Database test_db";
      $retval = $conn->query($sql);
      
      if(! $retval ) {
        die('Could not create database: ' . mysqli_error());
      }
      
      echo "Database test_db created successfully\n";
      $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

      $retval1 = mysqli_select_db( $conn, DB_NAME);

         if(! $retval1 ) {
            die('Could not select database: ' . mysqli_error($conn));
         }
         echo "Database TUTORIALS selected successfully\n";
  
      //creatin table
      $query = '';
      $sqlScript = file('test_db.sql');
      foreach ($sqlScript as $line)	{
        
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
          continue;
        }
          
        $query = $query . $line;
        if ($endWith == ';') {
          mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
          $query= '';		
	}
}
echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';
    }
  }catch(Exception $e) {
    $sql = "CREATE Database test_db";
      $retval = $conn->query($sql);
      
      if(!$retval ) {
        die('Could not create database: ' . mysqli_error());
      }
      
      echo "Database test_db created successfully\n";
      $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

      $retval1 = mysqli_select_db( $conn, DB_NAME);

         if(! $retval1 ) {
            die('Could not select database: ' . mysqli_error($conn));
         }
         echo "Database TUTORIALS selected successfully\n";
  
      //creatin table
      $query = '';
      $sqlScript = file('test_db.sql');
      foreach ($sqlScript as $line)	{
        
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
          continue;
        }
          
        $query = $query . $line;
        if ($endWith == ';') {
          mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
          $query= '';		
	}
}
echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';
    echo 'Message: ' .$e->getMessage();
  }
?>