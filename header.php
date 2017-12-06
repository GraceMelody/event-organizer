<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Organizer Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" type="text/css" href="style1.css">
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

<div class="container">
  <h3 class="col-lg-offset-10 col-md-offset-8 col-sm-offset-5 col-xs-offset-0" style="color: white;">Welcome,  <?php username() ?></h3>
  <div class="col-lg-offset-11 col-md-offset-10 col-sm-offset-7 col-xs-offset-0">
      <a href="logout.php"><button type="button" class="btn btn-lg explorebtn glyphicon glyphicon-log-out" name="submit"> Logout</button></a>
    </div>

  <div class="col-xs-12 col-sm-3">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse" id="myNavbar">
          <div class="tabel1">
            <ul class="nav">



