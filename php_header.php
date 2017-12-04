<?php
  @session_start();
  require('db.php');
  
  function show_error_dialog($msg) {
    ?>
    <script>
    $(document).ready(function(){
      alert("<?php echo($msg) ?>");
    })
    </script>
    <?php
  }
  
  function checkLogin() {
    require('db.php');
    if (!isset($_SESSION['username'])) {
      header("Location: login.php");
    }
  }
  
  function username() {
    echo $_SESSION['username'];
  }
  
  function getNIP() {
    return $_SESSION['nip'];
  }
  
  function canEditMaster() {
    return $_SESSION['is_admin'];
  }
  
  function canEditHonor(){
    return $_SESSION['is_admin'] || $_SESSION['is_koordinator'];
  }
  
  function checkCanEditMaster() {
    if (!canEditMaster()) {
      header("Location: laporan-honor.php");
    }
  }
  
  function checkCanEditHonor() {
    if (!canEditHonor()) {
      header("Location: laporan-honor.php");
    }
  }
?>