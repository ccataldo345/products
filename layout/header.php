<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Product list</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
  <script src='main.js'></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-3">
    <nav class="navbar navbar-dark bg-primary">
      <div class="col-8">
        <a class="navbar-brand">Product List</a>
      </div>
      <div class="col-4">
        <div style="float:right">
          <button class="btn btn-sm btn-success" type="submit" style="display: inline-block; margin-right: 10px">ADD</button>
          <button class="btn btn-sm btn-danger" type="submit" style="display: inline-block; margin-right: 10px">MASS
            DELETE</button>
        </div>
      </div>
    </nav>
  </div>