<?php
include "components/database.php";
include "components/header.php";
include "components/save_product.php"
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

<?php include "components/footer.php" ?>