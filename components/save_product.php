<?php

if (isset($_POST["save"])) {

  $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);
  $conn->select_db(DB_NAME);

  // image upload
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $uploadOk = 1;

  // // Check file size < 500 Kb
  // if ($_FILES["fileToUpload"]["size"] > 500000) {
  //   echo "Sorry, your file is too large.";
  //   $uploadOk = 0;
  // }

  if ($uploadOk == 1) {
    if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      echo "Sorry, there was an error uploading your file. ";
      echo $_FILES['img']['error'];
    }
  }

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = "img/" . $_FILES['img']['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $lenght = $_POST['lenght'];
  
  $stmt = $conn->prepare("INSERT INTO " . PRODUCTS_TABLE . " (SKU, name, price, img, type) VALUES (?, ?, ?, ?, ?)");
  if (!$stmt) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
  $stmt->bind_param("ssdsi", $sku, $name, $price, $img, $type);
  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }
  $stmt->close();

  $product_id = $conn->insert_id;  

  switch ($type) {
    case "1":
      $new_type = "dvds";    
      $stmt = $conn->prepare("INSERT INTO " .$new_type . " VALUES (?, ?)");
      if (!$stmt) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
      $stmt->bind_param("id", $product_id, $size);  
      break;
    case "2":
      $new_type = "books";
      $stmt = $conn->prepare("INSERT INTO " .$new_type . " VALUES (?, ?)");
      if (!$stmt) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
      $stmt->bind_param("id", $product_id, $weight);
      break;
    case "3":
      $new_type = "furnitures";
      $stmt = $conn->prepare("INSERT INTO " .$new_type . " VALUES (?, ?, ?, ?)");
      if (!$stmt) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
      $stmt->bind_param("iddd", $product_id, $height, $width, $lenght);
      break;
  }
  if (!$stmt->execute()) {
    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
  }
  $stmt->close();

  $conn->close();

  header("Location:index.php");
}
