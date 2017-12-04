<?php require('php_header.php') ?>


<?php
  if (isset($_POST['setActive'])) {
    // Set active
    $query = "UPDATE personal SET aktif=? WHERE id=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param("ii", $_POST['setActive'], $_POST['id']);
    $stmt->execute();
    echo $query;
    echo $_POST['setActive'];
    echo $_POST['id'];
    die();
  }

  if (isset($_POST['submit'])) {
    // Tambah event

    $query = "INSERT INTO personal (nip, nama, id_bagian, email, hp, rekening, koordinator, entry_honor, aktif) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";

    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $true_bool = true;
    $koordinator_val = isset($_POST['koordinator']) ? 1 : 0;
    $entry_honor_val = isset($_POST['entry_honor']) ? 1 : 0;
    $stmt->bind_param("isisiiiii", $_POST['nip'], $_POST['nama'], $_POST['id_bagian'], $_POST['email'], $_POST['hp'], $_POST['rekening'], $koordinator_val, $entry_honor_val, $true_bool);
    $stmt->execute() or die($db->error);
  }

  function populateTable() {
    require('db.php');
    $query = "SELECT personal.nip, personal.nama, bagian.nama ,personal.rekening, personal.koordinator, personal.admin, personal.aktif FROM personal INNER JOIN bagian ON personal.id_bagian=bagian.id";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($nip, $nama, $nama_bagian,$norek,$koordinator,$entry_honor, $aktif);

    while ($stmt->fetch()) {
    ?>
         <tr>
           <td><?php echo $nip ?></td>
           <td><?php echo $nama ?></td>
           <td><?php echo $nama_bagian ?></td>
           <td><?php echo $norek ?></td>
           <td><div class="checkbox">
              <label><input type="checkbox" <?php echo $koordinator ? "checked" : "" ?> data-id="<?php echo $id ?>"></label>
        </div></td>
           <td><div class="checkbox">
              <label><input type="checkbox" <?php echo $entry_honor ? "checked" : "" ?> data-id="<?php echo $id ?>"></label>
        </div></td>
           <td><div class="checkbox">
              <label><input type="checkbox" <?php echo $aktif ? "checked" : "" ?> data-id="<?php echo $id ?>"></label>
        </div></td>
         </tr>
    <?php
    }
  }

  function populateOptionDivisi() {

    require('db.php');
    $query = "SELECT id, nama FROM bagian WHERE aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama_bagian);

    while ($stmt->fetch()) {
      ?>

      <option value="<?php echo $id ?>"><?php echo $nama_bagian ?></option>

      <?php
    }
  }
?>

<?php require('header.php') ?>


<script>
  $(document).ready(function() {
    $('table input[type=checkbox]').click(function() {
      $.post('personal.php', {
          setActive: $(this).prop('checked') ? 1 : 0,
          id: $(this).data("id")
        })
    })
  })
</script>
              <li class="active">
                <a href="#">Data Master</a>
                <ul class="nav padder">


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
      <div class="col-xs-11">
      <h4>Welcome, testUser</h4>
        <h1>Personal</h1>

        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>NIP <span class="glyphicon glyphicon-sort"></th>
           <th>Nama<span class="glyphicon glyphicon-sort"></th>
           <th>Bagian<span class="glyphicon glyphicon-sort"></th>
           <th>No. Rek<span class="glyphicon glyphicon-sort"></th>
           <th>Koordinator <span class="glyphicon glyphicon-sort"></th>
           <th>Entry Honor <span class="glyphicon glyphicon-sort"></th>
           <th>Aktif <span class="glyphicon glyphicon-sort"></th>
         </tr>
       </thead>
       <tbody>
         <?php populateTable();?>
       </tbody>
     </table>

     <div class="row">
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
               <label for="divisi">Divisi:</label>
               <select class="form-control" id="divisi" name="id_bagian">
                <?php populateOptionDivisi() ?>
               </select>
                <label for="hp">HP/WA:</label>
                 <input type="text" class="form-control"id="hp"name="hp">
                 <label for="norek">No. Rek:</label>
                 <input type="text" class="form-control" id="norek"name="rekening">
                 <div class="checkbox">
                    <label><input type="checkbox" value="" name="koordinator">Koordinator</label>
                  </div>
                 <div class="checkbox">
                    <label><input type="checkbox" value="" name="entry_honor">Entry Honor</label>
                  </div>
               </div>

             </div>

            <button type="submit" class="btn btn-success col-xs-12" name="submit">Tambah</button>

      </form>
    </div>
  </div>
</div>
