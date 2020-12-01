<?php

function component($product_image, $product_SKU, $product_name, $product_price, $product_size) {
  $element = "
  <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
    <form action=\"index.php\" method=\"post\">
      <div class=\"card shadow\">
        <div>
          <img src=\"$product_image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
        </div>
        <div class=\"card-body\">
          <h5 class=\"card-sku\">$product_SKU</h5>
          <h5 class=\"card-title\">$product_name</h5>
          <h5 class=\"card-price\">$product_price  $</h5>
          <h5 class=\"card-Size\">$product_size</h5>
          <div class=\"form-check\">
            <input class=\"form-check-input my-3\" type=\"checkbox\" value=\"\" id=\"defaultCheck1\">
            <label class=\"form-check-label my-2\" for=\"defaultCheck1\">
              Select
            </label>
          </div>

          <input type=\"checkbox\" id=\"myCheck\" onclick=\"myFunction()\">
          <p id=\"text\" style=\"display:none\">Checkbox is CHECKED!</p>

        </div>
      </div>
    </form>
  </div>
  ";

  echo $element;
};

