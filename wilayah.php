<?php require('php_header.php') ?>

<?php
  if (isset($_POST['submit'])) {
    // Tambah wilayah
    
    $query = "INSERT INTO wilayah (nama, aktif) VALUES (?, ?)";
    
    $stmt = $db->prepare($query);
    $true_bool = true;
    $stmt->bind_param("si", $_POST['nama_wilayah'], $true_bool);
    $stmt->execute();
  }
?>

<?php require('header.php')?>
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

            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-xs-11">
      <h4>Welcome, testUser</h4>
        <h1>Wilayah</h1>

        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Nama <span class="glyphicon glyphicon-sort"></th>
           <th>Aktif</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>John</td>
           <td>Doe</td>
           <td><div class="checkbox">
  <label><input type="checkbox" value=""></label>
</div></td>
         </tr>
       </tbody>
     </table>

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
