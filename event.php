<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php checkCanEditMaster() ?>
<?php

  if (isset($_POST['setActive'])) {
    // Set active
    $query = "UPDATE event SET aktif=? WHERE id=?";
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
    if (empty($_POST['nama_event']) || empty($_POST['id_wilayah']) || empty($_POST['hari']) || empty($_POST['jam_mulai'] || empty($_POST['jam_selesai']))) {
      show_error_dialog("Semua field harus diisi!");
    } else {
      $query = "INSERT INTO event (nama, id_wilayah, hari, waktu_mulai, waktu_selesai, aktif) VALUES (?, ?, ?, ?, ?, ?)";

      $stmt = $db->prepare($query) or show_error_dialog($db->error);
      $true_bool = true;
      $stmt->bind_param("sisssi", $_POST['nama_event'], $_POST['id_wilayah'], $_POST['hari'], $_POST['jam_mulai'], $_POST['jam_selesai'], $true_bool);
      $stmt->execute() or die($db->error);
    }
  }

  function populateTable() {
    require('db.php');
    $query = "SELECT event.id, wilayah.nama, event.nama, event.hari, CONCAT(DATE_FORMAT(waktu_mulai, '%H:%i'), ' - ', DATE_FORMAT(waktu_selesai, '%H:%i')) ,event.aktif FROM event INNER JOIN wilayah ON event.id_wilayah=wilayah.id";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama_wilayah, $nama_event, $hari, $jam, $aktif);

    while ($stmt->fetch()) {
    ?>
         <tr>
           <td><?php echo $id ?></td>
           <td><?php echo $nama_wilayah ?></td>
           <td><?php echo $nama_event ?></td>
           <td><?php echo $hari ?></td>
           <td><?php echo $jam ?></td>
           <td><div class="checkbox">
              <label><input type="checkbox" <?php echo $aktif ? "checked" : "" ?> data-id="<?php echo $id ?>"></label>
        </div></td>
         </tr>
    <?php
    }
  }
  
  function populateHari() {
    ?>
    <option value="Senin">Senin</option>
    <option value="Selasa">Selasa</option>
    <option value="Rabu">Rabu</option>
    <option value="Kamis">Kamis</option>
    <option value="Jumat">Jumat</option>
    <option value="Sabtu">Sabtu</option>
    <option value="Minggu">Minggu</option>
    <?php
  }
  
  function populateOptionWilayah() {
    
    require('db.php');
    $query = "SELECT id, nama FROM wilayah WHERE aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama_wilayah);

    while ($stmt->fetch()) {
      ?>
      
      <option value="<?php echo $id ?>"><?php echo $nama_wilayah ?></option>
      
      <?php
    }
  }
?>

<?php require('header.php') ?>


<script>
  $(document).ready(function() {
    $('table input[type=checkbox]').click(function() {
      $.post('event.php', {
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
                 <li class="active inner"><a href="event.php">Event</a></li>
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
        <h1>Event</h1>
        <div class="table-container">
        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Wilayah<span class="glyphicon glyphicon-sort"></th>
           <th>Event<span class="glyphicon glyphicon-sort"></th>
           <th>Hari<span class="glyphicon glyphicon-sort"></th>
           <th>Jam<span class="glyphicon glyphicon-sort"></th>
           <th>Aktif <span class="glyphicon glyphicon-sort"></th>
         </tr>
       </thead>
       <tbody>
        <?php populateTable(); ?>
       </tbody>
     </table>
     </div>

     <div class="row">
       <h2>Data baru</h2>
       <form action="event.php" method="POST">
         <div class="col-md-11">
          <div class="form-group">

            <div class="col-md-9">
             <div class="form-group">
               <label for="wilayah">Wilayah:</label>
               <select class="form-control" id="wilayah" name="id_wilayah">
                 <?php populateOptionWilayah() ?>
               </select>

               <label for="event">Event:</label>
                <input type="text" class="form-control" id="event" name="nama_event">

               <label for="hari">Hari/Waktu:</label>
               <div class="row">

               <select class="form-control col-xs-2 hari-tanggal" id="hari" name="hari">
                 <?php populateHari() ?>
               </select>
                 <input type="time" class="form-control col-xs-2 hari-tanggal" placeholder="Jam Mulai" id="jam_mulai" name="jam_mulai">
                 <input type="time" class="form-control col-xs-2 hari-tanggal" placeholder="Jam Selesai" id="jam_selesai" name="jam_selesai">
               </div>

             </div>

            <button type="submit" class="btn btn-success" name="submit">Tambah</button>

      </form>
    </div>
  </div>
</div>
