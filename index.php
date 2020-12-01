<?php
include "../private/products_dbconn.php";
include "layout/header.php";
include "layout/component.php";

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
    component("./img/product01.png", "AAA0001", "DVD-disk 1", "21", "700 Mb");
    component("./img/product02.png", "AAA0002", "DVD-disk 2", "22", "700 Mb");
    component("./img/product03.png", "AAA0003", "DVD-disk 3", "23", "700 Mb");
    component("./img/product04.png", "AAA0004", "DVD-disk 4", "24", "700 Mb");
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

<?php include "layout/footer.php" ?>
