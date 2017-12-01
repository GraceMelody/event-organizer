<?php require('header.php') ?>
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
               <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip">
                <label for="nama">Nama:</label>
                 <input type="text" class="form-control" id="nama">
                 <label for="email">Email:</label>
                  <input type="text" class="form-control" id="email">
               <label for="divisi">Divisi:</label>
               <select class="form-control" id="divisi">
                 <option>Transportasi</option>
               </select>
                <label for="hp">HP/WA:</label>
                 <input type="text" class="form-control"id="hp">
                 <label for="norek">No. Rek:</label>
                 <input type="text" class="form-control" id="norek">
                 <div class="checkbox">
                    <label><input type="checkbox" value="">Koordinator</label>
                  </div>
                 <div class="checkbox">
                    <label><input type="checkbox" value="">Entry Honor</label>
                  </div>
               </div>

             </div>

            <button type="submit" class="btn btn-success ">Tambah</button>

      </form>
    </div>
  </div>
</div>
