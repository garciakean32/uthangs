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
  
      //creatin table
      $query_file = 'table_users.txt';
      
      $fp = fopen($query_file, 'r');
      $sql1 = fread($fp, filesize($query_file));
      fclose($fp); 
      
      mysqli_select_db($conn, DB_NAME);
  
      $retval1 = $conn->query($sql1);
      
      if(! $retval1 ) {
        die('Could not create table: ' . mysqli_error());
      }
      
      echo "Table employee created successfully\n";
    }
  }catch(Exception $e) {
    $sql = "CREATE Database test_db";
      $retval = $conn->query($sql);
      
      if(!$retval ) {
        die('Could not create database: ' . mysqli_error());
      }
      
      echo "Database test_db created successfully\n";
      $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  
      //creatin table
      $query_file = 'sql_query1.txt';
      
      $fp = fopen($query_file, 'r');
      $sql1 = fread($fp, filesize($query_file));
      fclose($fp); 
      
      mysqli_select_db($conn, DB_NAME);
  
      $retval1 = $conn->query($sql1);
      
      if(!$retval1 ) {
        die('Could not create table: ' . mysqli_error());
      }
      
      echo "Table employee created successfully\n";
    echo 'Message: ' .$e->getMessage();
  }
?>