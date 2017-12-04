<?php require("php_header.php")?>
<?php
if (isset($_SESSION['username'])) {
  header("Location: laporan-honor.php");
} else {
  if (isset($_POST['submit'])) {
    // $_SESSION['username'] = $_POST['username'];
    $query = "SELECT nama, koordinator, admin, nip FROM personal WHERE nip = ? AND password = ? AND aktif=1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ss",$_POST['username'], $_POST['pwd']);
    $stmt->execute();
    $stmt->bind_result($_SESSION['username'], $_SESSION['is_koordinator'], $_SESSION['is_admin'], $_SESSION['nip']);
    if ($stmt->fetch()) {
      header("Location: laporan-honor.php");
    }
    
    
    
  }
}
  ?>
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

<div class="container">
  <div class="text-center">
    <h1>Event Organizer Management System</h1>
    <h4>Bima, Evans, Grace, Yuan - 311510005, 311710008, 311710010, 311510025</h4>
  </div>
  <form action="login.php" method="POST">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
    <div class="form-group ">
      <label for="username">NIP:</label>
      <input type="number" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <button type="submit" class="btn btn-default" name="submit">Login</button>
  </form>
</div>
</div>
</body>
