<?php require('header.php') ?>
              <li class="active">
                <a href="#">Data Master</a>
                <ul class="nav padder">


                 <li><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li class="active inner"><a href="bagian.php">Bagian</a></li>
                 <li><a href="posisi.php">Posisi</a></li>
                 <li><a href="personal.php">Personal</a></li>
               </ul>
             </li>
              <li><a href="entry-honor.php">Entry Honor</a></li>
              <li><a href="laporan-honor.php">Laporan Honor</a></li>
              <li><a href="#">Pembelian</a></li>
              <li><a href="#">Evaluasi</a></li>
            </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="row">
      <div class="col-xs-11">
      <h4>Welcome, testUser</h4>
        <h1>Bagian</h1>

        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Nama Bagian <span class="glyphicon glyphicon-sort"></th>
           <th>Aktif <span class="glyphicon glyphicon-sort"></th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>1.</td>
           <td>Musik</td>
           <td><div class="checkbox">
              <label><input type="checkbox" value=""></label>
        </div></td>
         </tr>
       </tbody>
     </table>

     <div class="row">
       <h2>Data baru</h2>
       <form>
         <div class="col-md-11">
          <div class="form-group">

            <label for="nama-bag">Nama bagian:</label>
            <input type="text" class="form-control" id="nama-bag">
            </div>
            </div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-success ">Tambah</button>
          </div>
      </form>
    </div>
  </div>
</div>
