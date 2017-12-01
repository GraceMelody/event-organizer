<?php require('header.php') ?>
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
        <h1>Event</h1>

        <table class="table table-hover tablesorter">
       <thead>
         <tr class="active">
           <th>No <span class="glyphicon glyphicon-sort"></th>
           <th>Wilayah<span class="glyphicon glyphicon-sort"></th>
           <th>Event<span class="glyphicon glyphicon-sort"></th>
           <th>Hari<span class="glyphicon glyphicon-sort"></th>
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

            <div class="col-md-9">
             <div class="form-group">
               <label for="wilayah">Wilayah:</label>
               <select class="form-control" id="nama">
                 <option>Malang</option>
               </select>

               <label for="event">Event:</label>
                <input type="text" class="form-control" id="event">

               <label for="hari">Hari/Waktu:</label>
               <div class="row">

               <select class="form-control col-xs-2 hari-tanggal" id="hari">
                 <option>Senin</option>
               </select>
                 <input type="text" class="form-control col-xs-2 hari-tanggal" placeholder="Jam Mulai" id="jam_mulai">
                 <input type="text" class="form-control col-xs-2 hari-tanggal" placeholder="Jam Selesai" id="jam_selesai">
               </div>

             </div>

            <button type="submit" class="btn btn-success ">Tambah</button>
          
      </form>
    </div>
  </div>
</div>
