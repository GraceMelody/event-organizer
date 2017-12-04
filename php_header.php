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
  
?>