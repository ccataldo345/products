<?php
include($_SERVER["DOCUMENT_ROOT"] . "/private/dbconn.php");

define("DB_NAME", "productsDB");
define("PRODUCTS_TABLE", "products");
define("DVD_TABLE", "dvd");
define("BOOK_TABLE", "book");
define("FURNITURE_TABLE", "furniture");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === FALSE) {
  echo "Error creating database: " . $conn->error;
}

// Select database
// mysqli_select_db($conn, DB_NAME); // CC: NO OOP
$conn->select_db(DB_NAME);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS " . PRODUCTS_TABLE . " (
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

// Select all from database
$sql = "SELECT * FROM " . PRODUCTS_TABLE;
$result = $conn->query($sql);

$conn->close();
