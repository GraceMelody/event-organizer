<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php checkCanEditMaster() ?>
<?php
  if (isset($_POST['setActive'])) {
    // Set active
    $query = "UPDATE wilayah SET aktif=? WHERE id=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ii", $_POST['setActive'], $_POST['id']);
    $stmt->execute();
    echo $query;
    echo $_POST['setActive'];
    echo $_POST['id'];
    die();
  }
  
  if (isset($_POST['submit'])) {
    // Tambah wilayah

    $query = "INSERT INTO wilayah (nama, aktif) VALUES (?, ?)";

    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $true_bool = true;
    $stmt->bind_param("si", $_POST['nama_wilayah'], $true_bool);
    $stmt->execute();
  }

  function populateTable() {
    require('db.php');
    $query = "SELECT id, nama, aktif FROM wilayah";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama, $aktif);

    while ($stmt->fetch()) {
    ?>
       <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $nama ?></td>
        <td>
          <div class="checkbox">
            <label><input type="checkbox" <?php echo $aktif ? "checked" : "" ?> data-id="<?php echo $id ?>"></label>
          </div>
        </td>
        <td>
          <a href="#">Delete</a>
        </td>
       </tr>

    <?php
    }
  }
?>

<?php require('header.php')?>

<script>
  $(document).ready(function() {
    $('table input[type=checkbox]').click(function() {
      $.post('wilayah.php', {
          setActive: $(this).prop('checked') ? 1 : 0,
          id: $(this).data("id")
        })
    })
  })
</script>

              <li class="active">
                <a href="#">Data Master</a>
                <ul class="nav padder">


                 <li class="active inner"><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li><a href="bagian.php">Bagian</a></li>
                 <li><a href="posisi.php">Posisi</a></li>
                 <li><a href="personal.php">Personal</a></li>
               </ul>
             </li>
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <li><a href="laporan-honor.php">Laporan Honor</a></li>
              <li><a href="detail.php">Detail Honor</a></li>

            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-xs-11">
      <h4>Welcome, <?php username() ?></h4>
        <h1>Wilayah</h1>
        <div class="table-container">
        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Nama <span class="glyphicon glyphicon-sort"></th>
           <th>Aktif <span class="glyphicon glyphicon-sort"></th>
         </tr>
       </thead>
       <tbody>
       <?php populateTable() ?>
       </tbody>
     </table>
     </div>

<div class="row">
<h2>Data baru</h2>
       <form action="wilayah.php" method="POST">
         <div class="col-md-11">
          <div class="form-group">

            <label for="nama-wil">Nama:</label>
            <input type="text" class="form-control" name="nama_wilayah" id="nama-wil">

            </div>
            </div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-success" name="submit">Tambah</button>
          </div>
      </form>
    </div>
  </div>
</div>
