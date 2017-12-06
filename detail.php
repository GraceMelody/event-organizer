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
  function populateTable() {
    require('db.php');
    $query = "SELECT honor.id, posisi.nama, wilayah.nama, event.nama, DATE(honor.tanggal_event), FORMAT(honor.gaji, 2, 'de_DE') FROM honor
    INNER JOIN posisi ON honor.id_posisi = posisi.id
    INNER JOIN event ON honor.id_event = event.id
    INNER JOIN wilayah ON event.id_wilayah = wilayah.id
    WHERE DATE(tanggal_event) BETWEEN DATE(?) AND DATE(?) AND  id_personal=?";
    $stmt = $db->prepare($query) or show_error_dialog($db->error);
    $stmt->bind_param('ssi', $_GET['begin_date'], $_GET['end_date'], $_GET['id_user']);
    $stmt->execute();
    $stmt->bind_result($id, $posisi, $wilayah, $event, $date, $gaji);

    while ($stmt->fetch()) {
    ?>
          <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $posisi ?></td>
            <td><?php echo $wilayah ?></td>
            <td><?php echo $event ?></td>
            <td><?php echo $date ?></td>
            <td class="text-right"><?php echo $gaji ?></td>
            <td><a href="detail.php?id_user=<?php echo $id ?>"class="btn btn-default">Detail</a></td>
          </tr>
    <?php
    }
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
<script>
  $(document).ready(function(){
    //https://css-tricks.com/snippets/jquery/get-query-params-object/
    jQuery.extend({
      getQueryParameters : function(str) {
        return (str || document.location.search).replace(/(^\?)/,'').split("&").map(function(n){return n = n.split("="),this[n[0]] = n[1],this}.bind({}))[0];
      }
    });
    
    $('#begin_date').change(function() {
      const qs = $.getQueryParameters();
      qs.begin_date = $(this).prop("value")
      window.location = "detail.php?" + $.param(qs);
    })
    
    $('#end_date').change(function() {
      const qs = $.getQueryParameters();
      qs.end_date = $(this).prop("value")
      window.location = "detail.php?" + $.param(qs);
    })
  })
</script>
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
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="begin_date" <?php echo isset($_GET['begin_date']) ? 'value='.$_GET['begin_date'] : '' ?>>
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="end_date">
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
         <?php populateTable() ?>
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
