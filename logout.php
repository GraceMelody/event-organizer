<?php require("php_header.php") ?>
<?php checkLogin(); ?>
<?php session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Organizer Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" type="text/css" href="styles-login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="./jquery.tablesorter.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <script>

  $(document).ready(function(){
      // Bootstrap tooltip, https://www.w3schools.com/bootstrap/bootstrap_tooltip.asp
        $('.btn-watch').tooltip();
      // http://tablesorter.com/docs/
        $(".tablesorter").tablesorter();
  });




  </script>
</head>
<body>
<div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
      <div class="item background d"></div>
  </div>

  <div class="covertext">
    <div class="col-lg-12" style="float:none; margin:0 auto;">
      <h3 class="subtitle">Anda berhasil logout.</h3>
    </div>

    <div class="col-xs-12 explore">
      <a href="index.php">
      <button type="button" class="btn btn-lg explorebtn">Kembali ke Halaman Utama</button>
      </a>
    </div>
  </div>

</div>
