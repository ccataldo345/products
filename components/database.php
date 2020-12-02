<?php
include "../private/products_dbconn.php";

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully; ";

// Delete database
$sql = "DROP DATABASE " . DB_NAME;
if ($conn->query($sql) === TRUE) {
  echo "Database is deleted successfully; ";  
} else {  
  echo "Database is not deleted successfully\n";
}  

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully; ";
} else {
  echo "Error creating database: " . $conn->error;
}

// Select database
// mysqli_select_db($conn, DB_NAME);
$conn->select_db(DB_NAME);

if ($result = $conn->query("SELECT DATABASE()")) {
  $row = $result->fetch_row();
  printf("Default database is %s.\n", $row[0]);
  $result->close();
}

// Delete table
$sql = "DROP TABLE " . PRODUCTS_TABLE;
if ($conn->query($sql) === TRUE) {
  echo "Table is deleted successfully; ";  
} else {  
  echo "Table is not deleted successfully\n";
}  

// Create table
$sql = "CREATE TABLE IF NOT EXISTS " . PRODUCTS_TABLE . "(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  SKU VARCHAR(9) NOT NULL,
  name VARCHAR(50) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  img VARCHAR(255),
  type INT
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if ($conn->query($sql) === TRUE) {
  echo "Table PRODUCTS_TABLE created successfully; ";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO " . PRODUCTS_TABLE . "(SKU, name, price, img, type)
  VALUES
  ('JVC200123', 'Chrome CR OS 2.4.1290', 20, 'img/product01.png', 1),
  ('JVC200123', 'Ubuntu Cinamon Remix 20.10 LTS', 25, 'img/product02.png', 1),
  ('JVC200123', 'Bluewhite64 13.0 - 64 Bit', 15, 'img/product03.png', 1)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully; ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Select all from database
$sql = "SELECT * FROM " . PRODUCTS_TABLE;
$result = $conn->query($sql);

$conn->close();
