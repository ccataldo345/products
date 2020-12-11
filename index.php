<?php
include "components/database.php";
include "components/header.php";
include "components/layout_grid.php";
include "components/resetDB.php";

date_default_timezone_set("Europe/Tallinn");

if (!array_key_exists("timestamp", $_SESSION)) {
  $_SESSION["timestamp"] = date('l jS \of F Y H:i:s');
}
?>

<?php 
if (isset($_POST["resetDB"])) {
  resetDB();
}
?>

<div class="container mt-3">
  <nav class="navbar navbar-dark bg-primary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product List</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-success" type="submit" onclick="document.location='add.php'" style="display: inline-block; margin-right: 10px">ADD</button>
        <form method="post" id="delete_form" style="display: inline-block; margin-right: 10px">
          <button class="btn btn-sm btn-danger" type="submit" name="but_delete">
            MASS DELETE
          </button>
        </form>
        <form method="post" action="index.php" style="display: inline-block; margin-right: 10px">
          <button class="btn btn-sm btn-warning" type="submit" name="resetDB">RESET</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <p><small>⏱ You started visiting this page since <?= $_SESSION["timestamp"]; ?> (GMT+3) </small></p>

    <div class="row text-center py-5">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        products_grid($row['id'], $row['SKU'], $row['name'], $row['price'], $row['img'], $row['type']);
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
      }
      ?>
    </div>
  </div>
</div>

<?php include "components/footer.php" ?>