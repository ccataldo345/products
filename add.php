<?php
include "components/database.php";
include "components/header.php";
?>

<div class="container mt-3">
  <nav class="navbar navbar-dark bg-primary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product Add</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-success" type="submit" form="add_form" name="save" style="display: inline-block; margin-right: 10px">SAVE</button>
        <button class="btn btn-sm btn-danger" type="submit" onclick="document.location='index.php'" style="display: inline-block; margin-right: 10px">CANCEL</button>
      </div>
    </div>
  </nav>
</div>

<div class="container">

  <div class="col-8 my-3">
    <form id="add_form" action="add.php" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="sku" class="col-sm-2 col-form-label">SKU</label>
        <div class="col-sm-6">
          <input class="form-control" type="text" name="sku" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">NAME</label>
        <div class="col-sm-6">
          <input class="form-control" type="text" name="name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">PRICE ($)</label>
        <div class="col-sm-6">
          <input class="form-control" type="number" min="0.01" max="10000.00" step="0.01" name="price" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-sm-3 col-form-label">Choose picture</label>
        <div class="col-sm-5">
          <input type="file" class="form-control-file" name="img" id="img">
        </div>
      </div>
      <div class="form-group row">
        <label for="typeswitcher" class="col-sm-3 col-form-label">Type Switcher</label>
        <div class="col-sm-5">
          <select class="form-control" name="type">
            <option selected>Type Switcher</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</div>

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
?>

<?php include "components/footer.php" ?>