<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php checkCanEditHonor() ?>

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
    
    
    $query = "INSERT INTO honor 
    (id_event, id_personal, id_posisi, tanggal_event, honor.gaji, entry_user)
    SELECT ?, ?, personal.id_posisi, ?, posisi.gaji, ?
    FROM posisi INNER JOIN personal ON personal.id_posisi=posisi.id
    WHERE personal.nip=?";

    $stmt = $db->prepare($query) or die($db->error);
    $stmt->bind_param("iisii", $_POST['id_event'], $_POST['id_personal'], $_POST['event_date'], getNIP(), $_POST['id_personal']);
    $stmt->execute() or die($db->error);
  }

  function populateTable() {
    require('db.php');
    
    if (isset($_GET['id_wilayah']) && isset($_GET['id_event']) && isset($_GET['event_date'])) {
      $query = "SELECT 
                  honor.id,
                  personal.nama,
                  posisi.nama
                  FROM honor
                  INNER JOIN personal
                  ON honor.id_personal=personal.nip
                  INNER JOIN event
                  ON id_event=event.id
                  INNER JOIN posisi
                  ON honor.id_posisi=posisi.id
                  WHERE id_wilayah=?
                  AND id_event=?
                  AND DATE(tanggal_event) = ?
                  ";
      $stmt = $db->prepare($query) or show_error_dialog($db->error);
      $stmt->bind_param('iis',$_GET['id_wilayah'], $_GET['id_event'], $_GET['event_date']);
    } else {
      return;
    }
    
    $stmt->execute();
    $stmt->bind_result($id, $nama_personal, $posisi);

    while ($stmt->fetch()) {
    ?>
          <tr>
           <td><?php echo $id ?></td>
           <td><?php echo $nama_personal ?></td>
           <td><?php echo $posisi ?></td>
           <td><button type="button" class="btn btn-danger">Hapus</button></td>
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
  
  function populateOptionPerson() {
    
    require('db.php');
    $query = "SELECT nip, personal.nama, posisi.nama FROM personal INNER JOIN posisi on id_posisi=posisi.id WHERE personal.aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama, $posisi);

    while ($stmt->fetch()) {
      ?>
      
      <option data-posisi="<?php echo $posisi ?>" value="<?php echo $id ?>"><?php echo $nama ?></option>
      
      <?php
    }
  }
  
  function populateOptionPosisi() {
    
    require('db.php');
    $query = "SELECT id, nama FROM posisi WHERE aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama);

    while ($stmt->fetch()) {
      ?>
      <option value="<?php echo $id ?>"><?php echo $nama ?></option>
      
      <?php
    }
  }
  
  function populateOptionWilayah() {
    
    require('db.php');
    $query = "SELECT id, nama FROM wilayah WHERE aktif = 1";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama_wilayah);

    ?>
    <option disabled selected>---</option>
    <?php
    while ($stmt->fetch()) {
      $isSelected = '';
      if(isset($_GET['id_wilayah'])) {
        $isSelected = $_GET['id_wilayah'] == $id ? 'selected' : '';
      }
      
      ?>
      
      <option value="<?php echo $id ?>" <?php echo $isSelected ?>><?php echo $nama_wilayah ?></option>
      
      <?php
    }
  }
  
  function populateOptionEvent() {
    require('db.php');
    
    
    ?>
    <option disabled selected>---</option>
    <?php
    
    if (!isset($_GET['id_wilayah'])) {
      return;
    }
    
    $query = "SELECT id, nama FROM event WHERE aktif = 1 AND id_wilayah = ".$_GET['id_wilayah'];
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->execute();
    $stmt->bind_result($id, $nama);
    
    
    while ($stmt->fetch()) {
      
        $isSelected = $_GET['id_event'] == $id ? 'selected' : '';
      
      
      ?>
      
      <option value="<?php echo $id ?>" <?php echo $isSelected ?>><?php echo $nama ?></option>
      
      <?php
    }
  }
?>

<?php require('header.php') ?>


<script>
  $(document).ready(function() {
    $('#select_wilayah').change(function() {
      window.location = "entry-honor.php?id_wilayah="+$(this).prop("value");
    })
    $('#select_event').change(function() {
      window.location = "entry-honor.php?id_wilayah=<?php echo isset($_GET['id_wilayah']) ? $_GET['id_wilayah'] : '' ?>&id_event="+$(this).prop("value");
    })
    
    $('#select_date').change(function() {
      window.location = "entry-honor.php?id_wilayah=<?php echo isset($_GET['id_wilayah']) ? $_GET['id_wilayah'] : '' ?>&id_event=<?php echo isset($_GET['id_event']) ? $_GET['id_event'] : '' ?>&event_date="+$(this).prop("value");
    })
    
    $('#posisi').html($('#nama').find(':selected').data('posisi'));
    $('#nama').change(function() {
      $('#posisi').html($(this).find(':selected').data('posisi'));
    })
    
  })
</script>
              <?php if (canEditMaster()) { ?>
              <li>
                <a href="#">Data Master</a>
                <ul class="nav padder">


                 <li><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li><a href="bagian.php">Bagian</a></li>
                 <li><a href="posisi.php">Posisi</a></li>
                 <li><a href="personal.php">Personal</a></li>
               </ul>
             </li>
             <?php } ?>
              <li class="active"><a href="entry-honor.php">Entry Honor</a></li>
              <?php if (canCheckLaporanHonor()) { ?>
              <li><a href="laporan-honor.php">Laporan Honor</a></li>
              <?php } ?>
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
        <h1>Entry Honor</h1>
        <div class="row">
          <div class="form-group col-xs-4">
            <label for="sel1">Wilayah:</label>
            <select class="form-control" id="select_wilayah">
              <?php populateOptionWilayah() ?>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="sel1">Event:</label>
            <select class="form-control" id="select_event" <?php echo !isset($_GET['id_wilayah']) ? 'disabled' : '' ?> >
              <?php populateOptionEvent() ?>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="sel1">Tanggal:</label>
            <input type="date"  <?php echo !isset($_GET['id_event']) ? 'disabled' : '' ?> class="form-control" id="select_date" <?php echo isset($_GET['event_date']) ? 'value='.$_GET['event_date'] : '' ?>>
          </input>
          </div>
        </div>
        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Nama <span class="glyphicon glyphicon-sort"></th>
           <th>Posisi <span class="glyphicon glyphicon-sort"></th>
           <th>Hapus</th>
         </tr>
       </thead>
       <tbody>
       <?php populateTable() ?>
       </tbody>
     </table>
     
       <form action="entry-honor.php?id_wilayah=<?php echo isset($_GET['id_wilayah']) ? $_GET['id_wilayah'] : '' ?>&id_event=<?php echo isset($_GET['id_event']) ? $_GET['id_event'] : '' ?>&event_date=<?php echo isset($_GET['event_date']) ? $_GET['event_date'] : '' ?>" method="POST">
        <input type="hidden" name="id_event" value="<?php echo $_GET['id_event']?>">
        <input type="hidden" name="event_date" value="<?php echo $_GET['event_date']?>">
        
         <div class="col-md-9">
          <div class="form-group">
            <label for="nama">Nama:</label>
            <select class="form-control" id="nama" name="id_personal">
              <?php populateOptionPerson(); ?>
            </select>
              <label>Posisi:</label> <span id="posisi">ASDF</span>
            </div>
          </div>
          <div class="col-md-2 col-md-offset-9">
            <button type="submit" class="btn btn-success" name="submit">Tambah</button>
          </div>

      </form>
    </div>
  </div>
</div>
