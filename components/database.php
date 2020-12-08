<?php
include "../private/products_dbconn.php";

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully; ";

/*
// Delete database
$sql = "DROP DATABASE " . DB_NAME;
if ($conn->query($sql) === FALSE) {
  echo "Database is not deleted successfully\n";
}
// echo "Database is deleted successfully; ";  
*/

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === FALSE) {
  echo "Error creating database: " . $conn->error;
} 
//echo "Database created successfully; ";

// Select database
// mysqli_select_db($conn, DB_NAME);
$conn->select_db(DB_NAME);

/*
// Delete table
$sql = "DROP TABLE " . PRODUCTS_TABLE;
if ($conn->query($sql) === FALSE) {
  echo "Table is not deleted successfully\n";  
} 
// echo "Table is deleted successfully; "; 
*/

// Create table
$sql = "CREATE TABLE IF NOT EXISTS " . PRODUCTS_TABLE . "(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  SKU VARCHAR(9) NOT NULL,
  name VARCHAR(128) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  img VARCHAR(255),
  type INT
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}
// echo "Table PRODUCTS_TABLE created successfully; ";

/*
$sql = "INSERT INTO " . PRODUCTS_TABLE . "(SKU, name, price, img, type)
  VALUES
  ('JVC200123', 'Chrome CR OS 2.4.1290', 20.00, 'img/product01.png', 1),
  ('JVC200123', 'Ubuntu Cinamon Remix 20.10 LTS', 25.99, 'img/product02.png', 1),
  ('JVC200123', 'Bluewhite64 13.0 - 64 Bit', 15.00, 'img/product03.png', 1),
  ('JVC200123', 'Android x86 9.0  - 32/64Bit', 18.50, 'img/product04.png', 1),
  ('GGWP0007', 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5', 27.49, 'img/product05.png', 2),
  ('GGWP0007', 'SQL QuickStart Guide: The Simplified Beginner\'s Guide', 23.74, 'img/product06.png', 2),
  ('GGWP0007', 'Clean Code: A Handbook of Agile Software', 42.31, 'img/product07.png', 2),
  ('GGWP0007', 'Programming: 4 Manuscripts in 1', 47.97, 'img/product08.png', 2),
  ('TR120555', 'Basics Gaming Computer Desk with Storage', 82.73, 'img/product09.png', 3),
  ('TR120555', 'Gaming Chair High Back Computer', 142.00, 'img/product10.png', 3),
  ('TR120555', 'Clip Light Reading', 16.99, 'img/product11.png', 3),
  ('TR120555', 'Flash Furniture Black Sit', 55.59, 'img/product12.png', 3)
  ";

if ($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// echo "New record created successfully; ";
*/

// Select all from database
$sql = "SELECT * FROM " . PRODUCTS_TABLE;
$result = $conn->query($sql);

$conn->close();
