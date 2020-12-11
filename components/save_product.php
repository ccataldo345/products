<?php

if (isset($_POST["save"])) {

  $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);
  $conn->select_db(DB_NAME);

  // image upload
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Check file size < 500 Kb
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if ($uploadOk == 1) {
    if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      echo "Sorry, there was an error uploading your file. ";
      echo $_FILES['img']['error'];
    }
  }

  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO " . PRODUCTS_TABLE . " (SKU, name, price, img, type) VALUES (?, ?, ?, ?, ?)");
  if (!$stmt) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);

  $stmt->bind_param("ssdsi", $sku, $name, $price, $img, $type);

  // set parameters and execute
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = "img/" . $_FILES['img']['name'];
  $type = $_POST['type'];

  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }

  $stmt->close();
  $conn->close();
  header("Location:index.php");
}
