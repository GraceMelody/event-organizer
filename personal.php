<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php checkCanEditMaster() ?>
<?php
  if (isset($_POST['setActive'])) {
    // Set active
    $query = "UPDATE personal SET aktif=? WHERE nip=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ii", $_POST['setActive'], $_POST['nip']);
    $stmt->execute();
    die();
  }
  
  if (isset($_POST['setKoordinator'])) {
    // Set active
    $query = "UPDATE personal SET koordinator=? WHERE nip=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ii", $_POST['setKoordinator'], $_POST['nip']);
    $stmt->execute();
    die();
  }
  
  if (isset($_POST['setAdmin'])) {
    // Set active
    $query = "UPDATE personal SET admin=? WHERE nip=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ii", $_POST['setAdmin'], $_POST['nip']);
    $stmt->execute();
    die();
  }

  if (isset($_POST['submit'])) {
    // Tambah event
    $query = "INSERT INTO personal (nip, nama, id_posisi, email, hp, rekening, koordinator, admin, aktif, entry_user) VALUES (?, ?, ?, ?, ?, ?,?,?,?, ?)";

    $stmt = $db->prepare($query) or die($db->error);
    $true_bool = true;
    $koordinator_val = isset($_POST['koordinator']) ? 1 : 0;
    $admin_val = isset($_POST['admin']) ? 1 : 0;
    $stmt->bind_param("isisiiiiii", $_POST['nip'], $_POST['nama'], $_POST['id_posisi'], $_POST['email'], $_POST['hp'], $_POST['rekening'], $koordinator_val, $admin_val, $true_bool, getNIP());
    $stmt->execute() or die($db->error);
  }

  function populateTable() {
    require('db.php');
    $query = "SELECT personal.nip, personal.nama, posisi.nama ,personal.rekening, personal.koordinator, personal.admin, personal.aktif FROM personal INNER JOIN posisi ON personal.id_posisi=posisi.id";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($nip, $nama, $nama_posisi,$norek,$koordinator, $admin, $aktif);

    while ($stmt->fetch()) {
    ?>
         <tr>
           <td><?php echo $nip ?></td>
           <td><?php echo $nama ?></td>
           <td><?php echo $nama_posisi ?></td>
           <td><?php echo $norek ?></td>
           <td><div class="checkbox">
              <label><input type="checkbox" class="check-koordinator" <?php echo $koordinator ? "checked" : "" ?> data-nip="<?php echo $nip ?>"></label>
        </div></td>
           <td><div class="checkbox">
              <label><input type="checkbox" class="check-admin" <?php echo $admin ? "checked" : "" ?> data-nip="<?php echo $nip ?>"></label>
        </div></td>
           <td><div class="checkbox">
              <label><input type="checkbox" class="check-aktif" <?php echo $aktif ? "checked" : "" ?> data-nip="<?php echo $nip ?>"></label>
        </div></td>
         </tr>
    <?php
    }
  }

  function populateOptionPosisi() {

    require('db.php');
    $query = "SELECT id, nama FROM posisi WHERE aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama_posisi);

    while ($stmt->fetch()) {
      ?>

      <option value="<?php echo $id ?>"><?php echo $nama_posisi ?></option>

      <?php
    }
  }
?>

<?php require('header.php') ?>


<script>
  $(document).ready(function() {
    $('table input[type=checkbox].check-aktif').click(function() {
      $.post('personal.php', {
          setActive: $(this).prop('checked') ? 1 : 0,
          nip: $(this).data("nip")
        })
    })
    
    $('table input[type=checkbox].check-koordinator').click(function() {
      $.post('personal.php', {
          setKoordinator: $(this).prop('checked') ? 1 : 0,
          nip: $(this).data("nip")
        })
    })
    
    $('table input[type=checkbox].check-admin').click(function() {
      $.post('personal.php', {
          setAdmin: $(this).prop('checked') ? 1 : 0,
          nip: $(this).data("nip")
        })
    })
  })
</script>
              <li class="active">
                <a href="#">Data Master</a>
                <ul class="nav-padder">
                 <li><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li><a href="bagian.php">Bagian</a></li>
                 <li><a href="posisi.php">Posisi</a></li>
                 <li class="active inner"><a href="personal.php">Personal</a></li>
               </ul>
             </li>
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <li><a href="laporan-honor.php">Laporan Honor</a></li>

            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-sm-11">
        <h1>Personal</h1>
      <div class="table-container">
      <table class="table table-hover tablesorter">
       <thead>
         <tr class="tabelurut">
           <th>NIP <span class="glyphicon glyphicon-sort"></th>
           <th>Nama<span class="glyphicon glyphicon-sort"></th>
           <th>Posisi<span class="glyphicon glyphicon-sort"></th>
           <th>No. Rek<span class="glyphicon glyphicon-sort"></th>
           <th>Koordinator <span class="glyphicon glyphicon-sort"></th>
           <th>Admin <span class="glyphicon glyphicon-sort"></th>
           <th>Aktif <span class="glyphicon glyphicon-sort"></th>
         </tr>
       </thead>
       <tbody>
         <?php populateTable();?>
       </tbody>
     </table>
     </div>

     <div class="padding-padding">
       <h2>Data baru</h2>
       <form action="personal.php" method="POST">
         <div class="col-md-11">
          <div class="form-group">

            <div class="col-md-9">
             <div class="form-group">
               <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip">
                <label for="nama">Nama:</label>
                 <input type="text" class="form-control" id="nama" name="nama">
                 <label for="email">Email:</label>
                  <input type="text" class="form-control" id="email" name="email">
               <label for="posisi">Posisi:</label>
               <select class="form-control" id="posisi" name="id_posisi">
                <?php populateOptionPosisi() ?>
               </select>
                <label for="hp">HP/WA:</label>
                 <input type="text" class="form-control"id="hp"name="hp">
                 <label for="norek">No. Rek:</label>
                 <input type="text" class="form-control" id="norek"name="rekening">
                 <div class="checkbox">
                    <label><input type="checkbox" value="" name="koordinator">Koordinator</label>
                  </div>
                 <div class="checkbox">
                    <label><input type="checkbox" value="" name="admin">Admin</label>
                  </div>
               </div>

             </div>

            <button type="submit" class="btn btn-success col-xs-9" name="submit">Tambah</button>

      </form>
    </div>
  </div>
</div>
