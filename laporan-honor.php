<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php checkCanCheckLaporanHonor() ?>

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

    $query = "INSERT INTO event (nama, id_wilayah, hari, waktu_mulai, waktu_selesai, aktif) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $true_bool = true;
    $stmt->bind_param("sisssi", $_POST['nama_event'], $_POST['id_wilayah'], $_POST['hari'], $_POST['jam_mulai'], $_POST['jam_selesai'], $true_bool);
    $stmt->execute() or die($db->error);
  }

  function getTotalPrice() {
    require('db.php');
    $query = "SELECT FORMAT(SUM(gaji), 2, 'de_DE') FROM honor INNER JOIN personal ON id_personal=personal.nip WHERE DATE(tanggal_event) BETWEEN DATE(?) AND DATE(?)";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param('ss', $_GET['begin_date'], $_GET['end_date']);
    $stmt->execute();
    $stmt->bind_result($grand_total_gaji);
    $stmt->fetch();
    ?>
    <h3>Total: Rp<?php echo $grand_total_gaji; ?></h3>
    <?php
  }
  
  function populateTable() {
    require('db.php');
    $query = "SELECT id, personal.nama, FORMAT(SUM(gaji), 2, 'de_DE') FROM honor INNER JOIN personal ON id_personal=personal.nip WHERE DATE(tanggal_event) BETWEEN DATE(?) AND DATE(?) GROUP BY id_personal";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param('ss', $_GET['begin_date'], $_GET['end_date']);
    $stmt->execute();
    $stmt->bind_result($id, $nama, $total_gaji);

    while ($stmt->fetch()) {
    ?>
          <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $nama ?></td>
            <td><?php echo $total_gaji ?></td>
            <td><a href="detail.php?id_user=<?php echo $id ?>"class="btn btn-default">Detail</a></td>
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
  
  function populateOptionBagian() {
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
    $('#begin_date').change(function() {
      window.location = "laporan-honor.php?begin_date="+$(this).prop("value");
    })
    
    $('#end_date').change(function() {
      window.location = "laporan-honor.php?begin_date=<?php echo isset($_GET['begin_date']) ? $_GET['begin_date'] : '' ?>&end_date="+$(this).prop("value");
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
              <?php if (canEditHonor()) { ?>
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <?php } ?>
              <li class="active"><a href="laporan-honor.php">Laporan Honor</a></li>
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
        <h1>Rekap Honor</h1>
        <div class="row">
          <div class="form-group">
            <label for="sel1" class="col-lg-2 col-sm-12">Periode:</label>
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="begin_date" <?php echo isset($_GET['begin_date']) ? "value=\"".$_GET['begin_date']."\"" : '' ?> >
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="end_date" <?php echo isset($_GET['begin_date']) ? '' : 'disabled'  ?> <?php echo isset($_GET['end_date']) ? "value=\"".$_GET['end_date']."\"" : ''?>>
        </div>

          <div class="form-group col-xs-9">
            <label for="sel1">Bagian:</label>
            <select class="form-control" id="wilayah">
              <?php populateOptionBagian() ?>
            </select>
        </div>
        <div class="table-container">
        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Nama <span class="glyphicon glyphicon-sort"></th>
           <th>Total <span class="glyphicon glyphicon-sort"></th>
           <th>Detail</th>
         </tr>
       </thead>
       <tbody>
          <?php populateTable() ?>
       </tbody>
     </table>
     </div>


       <?php getTotalPrice() ?>
       <button type="button" class="btn btn-primary">Ekspor CSV</button>

      </form>
    </div>
  </div>
</div>
