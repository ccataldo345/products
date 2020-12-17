<?php
include($_SERVER["DOCUMENT_ROOT"] . "/private/dbconn.php");

define("DB_NAME", "productsDB");
define("PRODUCTS_TABLE", "products");
define("DVD_TABLE", "dvds");
define("BOOK_TABLE", "books");
define("FURNITURE_TABLE", "furnitures");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select database
// mysqli_select_db($conn, DB_NAME); // CC: NO OOP
$conn->select_db(DB_NAME);

// Select all from database
$sql = "SELECT * FROM " . PRODUCTS_TABLE;

if ($conn->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$result = $conn->query($sql);

$conn->close();
