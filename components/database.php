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

$sql = "SELECT products.product_id, SKU, name, price, img, size, weight, height, width, length
FROM  products
LEFT JOIN dvds ON products.product_id = dvds.product_id
LEFT JOIN books ON products.product_id = books.product_id
LEFT JOIN furnitures ON products.product_id = furnitures.product_id
ORDER BY products.product_id;";

$result = $conn->query($sql);

if ($result === FALSE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
