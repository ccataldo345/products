<?php
$form_errors = false;
$skuErr = $nameErr = $priceErr = "";
$sku = $name = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sku"]) or strlen($_POST["sku"]) > 9) {
    $form_errors = true;
    $skuErr = "* Wrong input.";
  } else {
    $sku = test_input($_POST["sku"]);
  }

  if (empty($_POST["name"])) {
    $form_errors = true;
    $nameErr = "* Wrong input.";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["price"])) {
    $form_errors = true;
    $priceErr = "* Wrong input.";
  } else {
    $price = test_input($_POST["price"]);
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);  
  return $data;
}

