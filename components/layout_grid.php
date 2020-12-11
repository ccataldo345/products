<?php

while ($row = mysqli_fetch_assoc($result)) {
  products_grid($row['id'], $row['SKU'], $row['name'], $row['price'], $row['img'], $row['type']);
}

function products_grid($id, $product_SKU, $product_name, $product_price, $product_image, $product_type)
{
  $element = "
  <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='index.php' method='post'>
      <div class='card-deck'>
        <div class='card'>
          <img src='$product_image' alt='Image1' class='img-fluid card-img-top'>
          <div class='card-body'>
            <h5 class='card-title'>$product_SKU</h5>
            <h5 class='card-text'>$product_name</h5>
            <h5 class='card-text'>$product_price  $</h5>
            <h5 class='card-text'>$product_type</h5>
            <div class='form-check'>
              <input class='form-check-input' type='checkbox' form='delete_form' name='delete[]' value='$id' id='defaultCheck1'>
              <label class='form-check-label' for='defaultCheck1'>
                Select
              </label>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  ";

  echo $element;
};
