<?php

if (isset($_POST["resetDB"])) {
  
  $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);
  
  $sql_file = file_get_contents('schema.sql');

  if ($conn->multi_query($sql_file) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->select_db(DB_NAME);

  $conn->close();

  header("Refresh:2");
  
}
