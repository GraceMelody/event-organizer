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
?>