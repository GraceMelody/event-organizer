<?php require("php_header.php") ?>

<?php
if (isset($_SESSION['username'])) {
  header("Location: detail.php");
} else {
  if (isset($_POST['submit'])) {
    // $_SESSION['username'] = $_POST['username'];
    $query = "SELECT nama, koordinator, admin, entry_honor, nip FROM personal WHERE nip = ? AND password = ? AND aktif=1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ss",$_POST['username'], $_POST['pwd']);
    $stmt->execute();
    $stmt->bind_result($_SESSION['username'], $_SESSION['is_koordinator'], $_SESSION['is_admin'], $_SESSION['is_honor_editor'], $_SESSION['nip']);
    if ($stmt->fetch()) {
      header("Location: detail.php");
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
  <div class="login">
  <div class="col-lg-12" style="float:none; margin:0 auto;">
    <h1 class="login1"><u>Log in to System</u></h1>
  </div>


  <form action="login.php" method="POST">
    <div class="login">
      <div class="col-md-4 col-md-offset-4">
    <div class="form-group ">
      <label for="username" class="inputan">NIP:</label>
      <input type="number" class="form-control" id="username" name="username" placeholder="nomor NIP">
    </div>
    <div class="form-group">
      <label for="pwd" class="inputan">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="password">
    </div>
    <button type="submit" class="button" name="submit">login</button>
  </form>
  </div>
</div>

</body>
