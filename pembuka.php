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
<html>
<head>
	<title>Event organizer Management System</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
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
  <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner" role="listbox">
      <div class="item active background a"></div>
      <div class="item background b"></div>
      <div class="item background c"></div>
    </div>
  </div>

  <div class="covertext">
    <div class="col-lg-12" style="float:none; margin:0 auto;">
      <h2 class="title">Event Organizer Management System</h2>
      <h3 class="subtitle">Oleh kelompok</h3>
      <h5 class="subtitle">Bima  - 311510005  Evans - 311710008</h5>
      <h5 class="subtitle">Grace - 311710010 Yuan  - 311510025</h5>
    </div>
    <div class="col-xs-12 explore">
      <a href="login.php"><button type="button" class="btn btn-lg explorebtn">Log In</button></a>
    </div>
  </div>

</div>
</body>
</html>
