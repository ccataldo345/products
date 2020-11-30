<?php
include "header.php";
include "../private/eshop_dbconn.php";

date_default_timezone_set("Europe/Tallinn");

if (!array_key_exists("timestamp", $_SESSION)) {
  $_SESSION["timestamp"] = date('l jS \of F Y H:i:s');
}
?>

<div class="container">
  <p><small>⏱ You started visiting this page since <?= $_SESSION["timestamp"]; ?> (GMT+3) </small></p>

  <br>
  <br>
  <br>

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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include "footer.php" ?>
