<?php

if (isset($_POST["type"])) {
  $type = $_POST["type"];
  switch ($type) {
    case "1":
      $case = "
      <div class='form-group row'>
        <label for='size' class='col-sm-2 col-form-label'>Size (MB)</label>
        <div class='col-sm-6'>
          <input class='form-control' type='number' min='700' max='4700' step='100' name='size'>
        </div>
      </div>
      <p>Please provide the size of the DVD-disk in MB.</p> 
      ";
      echo $case;
      break;
    case "2":
      $case = "
      <div class='form-group row'>
        <label for='size' class='col-sm-2 col-form-label'>Weight (Kg)</label>
        <div class='col-sm-6'>
          <input class='form-control' type='number' min='0.5' max='20' step='0.5' name='weight'>
        </div>
      </div>
      <p>Please provide the weight of the book in Kg.</p> 
      ";
      echo $case;
      break;
    case "3":
      $case = "
      <div class='form-group row'>
        <label for='height' class='col-sm-2 col-form-label'>Heigh (cm)</label>
        <div class='col-sm-6'>
          <input class='form-control' type='number' min='1' max='200' step='1' name='height'>
        </div>
      </div>
      <div class='form-group row'>
        <label for='width' class='col-sm-2 col-form-label'>Width (cm)</label>
        <div class='col-sm-6'>
          <input class='form-control' type='number' min='1' max='200' step='1' name='width'>
        </div>
      </div>
      <div class='form-group row'>
        <label for='length' class='col-sm-2 col-form-label'>Length (cm)</label>
        <div class='col-sm-6'>
          <input class='form-control' type='number' min='1' max='200' step='1' name='length'>
        </div>
      </div>
      <p>Please provide the dimensions of the furniture in HxWxL.</p> 
      ";
      echo $case;
      break;
    default:
      echo "Please select a product type.";
  }
}
