<?php require('php_header.php') ?>


<?php

  if (isset($_POST['setActive'])) {
    // Set active
    $query = "UPDATE event SET aktif=? WHERE id=?";
    $stmt = $db->prepare($query);
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

    $stmt = $db->prepare($query);
    $true_bool = true;
    $stmt->bind_param("sisssi", $_POST['nama_event'], $_POST['id_wilayah'], $_POST['hari'], $_POST['jam_mulai'], $_POST['jam_selesai'], $true_bool);
    $stmt->execute() or die($db->error);
  }

  function populateTable() {
    require('db.php');
    $query = "SELECT event.id, wilayah.nama, event.nama, event.aktif FROM event INNER JOIN wilayah ON event.id_wilayah=wilayah.id";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id, $nama_wilayah, $nama_event, $aktif);

    while ($stmt->fetch()) {
    ?>
         <tr>
           <td><?php echo $id ?></td>
           <td><?php echo $nama_wilayah ?></td>
           <td><?php echo $nama_event ?></td>
           <td>Sabtu</td>
           <td>13.00 - 15.00</td>
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
    $stmt = $db->prepare($query);
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
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <li class="active"><a href="laporan-honor.php">Laporan Honor</a></li>

            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-xs-11">
      <h4>Welcome, testUser</h4>
        <h1>Rekap Honor</h1>
        <div class="row">
          <div class="form-group">
            <label for="sel1" class="col-lg-2 col-sm-12">Periode:</label>
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="sel1">
            <input type="date" class="form-control pad15 col-sm-12 col-lg-3 periode" id="sel2">
        </div>

          <div class="form-group col-xs-9">
            <label for="sel1">Bagian:</label>
            <select class="form-control" id="wilayah">
              <option>Musik</option>
            </select>
        </div>
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
         <tr>
           <td>John</td>
           <td>Doe</td>
           <td>john@example.com</td>
           <td><a href="detail.php"class="btn btn-default">Detail</a></td>
         </tr>
       </tbody>
     </table>


       <h3>Total Rp999K</h3>
       <button type="button" class="btn btn-primary">Ekspor CSV</button>

      </form>
    </div>
  </div>
</div>
