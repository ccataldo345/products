<?php

if (isset($_POST["but_delete"])) {
  $conn = new mysqli(DB_SERVER, DB_USER, DB_PASS);
  $conn->select_db(DB_NAME);
  if (isset($_POST["delete"])) {
    foreach ($_POST["delete"] as $deleteid) {
      $delete_product = "DELETE from " . PRODUCTS_TABLE . " WHERE id=" . $deleteid;
      $conn->query($delete_product);
      /* delete img from server folder
      $product_img = "SELECT img FROM " . PRODUCTS_TABLE . " WHERE id=" . $deleteid;
      $conn->query($product_img);
      $aaa = mysqli_fetch_assoc($conn->query($product_img));
      echo $aaa;
      unlink(mysqli_fetch_assoc($conn->query($product_img)));
      */
    }
  }
  $conn->close();
  header("Location:index.php");
}
