<?php require("php_header.php") ?>
<?php $_SESSION['loggedin']=1?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Organizer Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
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
<div class="text-center">
  <h1>Anda telah Logout.</h1>
  <a href="login.php" class="btn btn-primary">Kembali ke Halaman Login</a>
</div>
