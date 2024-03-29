<?php require("php_header.php")?>
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
    } else {
      show_error_dialog("NIP / Password salah! Silahkan coba kembali.");
    }



  }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<?php require('html-header.html'); ?>
<body class="login-page">

<div class="container">
  <div class="text-center">
    <h1 class="header-login">Log In to System</h1>
  </div>
  <form action="login.php" method="POST">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
    <div class="form-group ">
      <label for="username" class="field-label">NIP:</label>
      <input type="number" class="form-control" id="username" name="username" placeholder="NIM">
    </div>
    <div class="form-group">
      <label for="pwd" class="field-label">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd"placeholder="Password">
    </div>
    <button type="submit" class="btn btn-login" name="submit">Log In</button>
  </form>
</div>
</div>
</body>
