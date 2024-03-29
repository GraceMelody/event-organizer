<?php
  @session_start();
  require('db.php');
  
  function show_error_dialog($msg) {
    require('html-header.html');
    ?>
    <script>
    $(document).ready(function(){
      //alert("<?php echo($msg) ?>");
      $("body").append("<div id='error-dialog'><?php echo $msg ?><div>");
      $("#error-dialog").dialog({
        modal: true,
        title: "Error",
        buttons: {
          Ok: function() {
            $(this).dialog("close");
          }
        }
      });
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
    return $_SESSION['is_admin'] || $_SESSION['is_koordinator'] || $_SESSION['is_honor_editor'];
  }
  
  function canCheckLaporanHonor() {
    return $_SESSION['is_admin'] || $_SESSION['is_koordinator'];
  }
  
  function checkCanCheckLaporanHonor() {
    if (!canCheckLaporanHonor()) {
      header("Location: detail.php");
    }
  }
  
  function checkCanEditMaster() {
    if (!canEditMaster()) {
      header("Location: detail.php");
    }
  }
  
  function checkCanEditHonor() {
    if (!canEditHonor()) {
      header("Location: detail.php");
    }
  }
?>