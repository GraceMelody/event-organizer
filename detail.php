<?php require('php_header.php') ?>
<?php checkLogin(); ?>
<?php 
  if (!isset($_GET['id_user'])) {
    $_GET['id_user'] = getNIP();
  }
  
  if (!canCheckLaporanHonor()) {
    // You can only see yours...
    $_GET['id_user'] = getNIP();
  }
?>
<?php
  $query = "SELECT personal.nama, posisi.nama FROM personal INNER JOIN posisi ON personal.id_posisi=posisi.id WHERE personal.nip=?";
  $stmt = $db->prepare($query) or show_error_dialog($db->error);
  $stmt->bind_param('i', $_GET['id_user']);
  $stmt->execute();
  $stmt->bind_result($nama, $posisi);
  $stmt->fetch();
?>
<?php require('header.php') ?>
              <?php if(canEditMaster()) { ?>
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
              <?php if(canEditHonor()) { ?>
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <?php } ?>
              <?php if (canCheckLaporanHonor()) { ?>
              <li><a href="laporan-honor.php">Laporan Honor</a></li>
              <?php } ?>
              <li class="active"><a href="detail.php">Detail Honor</a></li>

            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-xs-11">
      <h4>Welcome, <?php username() ?></h4>
        <h1>Detail Honor</h1>
        <div class="row">
          <div class="form-group">
            <label for="sel1" class="col-lg-2 col-sm-12">Periode:</label>
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="sel1">
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="sel2">
        </div>

          <div class="form-group col-xs-9">
            <label for="sel1">Bagian: </label><span><?php echo $posisi ?></span>
        </div>
          <div class="form-group col-xs-9">
            <label for="sel1">Nama: </label><span><?php echo $nama ?></span>
        </div>
        <div class="table-container">
        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Posisi <span class="glyphicon glyphicon-sort"></th>
           <th>Wilayah <span class="glyphicon glyphicon-sort"></th>
           <th>Event <span class="glyphicon glyphicon-sort"></th>
           <th>Tanggal <span class="glyphicon glyphicon-sort"></th>
           <th>Rp. <span class="glyphicon glyphicon-sort"></th>

         </tr>
       </thead>
       <tbody>
         <tr>
           <td>John</td>
           <td>Doe</td>
           <td>john@example.com</td>
           <td><a href="detail.php"class="btn btn-default">Detail</a></td>
         </tr>
       </tbody>
     </table>
     </div>


       <h3>Total Rp999K</h3>
       <button type="button" class="btn btn-primary">Ekspor PDF</button>
       <button type="button" class="btn btn-primary">Kirim Ke</button>

      </form>
    </div>
  </div>
</div>
