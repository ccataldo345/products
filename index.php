<?php
include "components/database.php";
include "components/header.php";
include "components/layout_grid.php";

date_default_timezone_set("Europe/Tallinn");

if (!array_key_exists("timestamp", $_SESSION)) {
  $_SESSION["timestamp"] = date('l jS \of F Y H:i:s');
}
?>

<div class="container">
  <p><small>⏱ You started visiting this page since <?= $_SESSION["timestamp"]; ?> (GMT+3) </small></p>

  <br>

  <div class="row text-center py-5">
    <?php
    while($row=mysqli_fetch_assoc($result)){
      component($row['SKU'], $row['name'], $row['price'], $row['img'], $row['type']);
    }
    ?>
  </div>

  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
      Type
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">DVD-disk</a>
      <a class="dropdown-item" href="#">Book</a>
      <a class="dropdown-item" href="#">Furniture</a>
    </div>
  </div>
</div>

<br>

<?php include "components/footer.php" ?>
