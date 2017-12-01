<?php require('header.php') ?>
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
              <li class="active"><a href="entry-honor.php">Entry Honor</a></li>
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
        <h1>Entry Honor</h1>
        <div class="row">
          <div class="form-group col-xs-4">
            <label for="sel1">Wilayah:</label>
            <select class="form-control" id="wilayah">
              <option>Malang</option>
              <option>Surabaya</option>
              <option>Pasuruan</option>
              <option>Sidoarjo</option>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="sel1">Event:</label>
            <select class="form-control" id="wilayah">
              <option>Colony Cafe</option>
              <option>Black Castle</option>
              <option>Java Dancer</option>
              <option>Golden Heritage</option>
            </select>
          </div>
          <div class="form-group col-xs-4">
            <label for="sel1">Tanggal:</label>
            <input type="date" class="form-control" id="wilayah">
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
         <tr>
           <td>John</td>
           <td>Doe</td>
           <td>john@example.com</td>
           <td><button type="button" class="btn btn-danger">Hapus</button></td>
         </tr>
       </tbody>
     </table>


       <form>
         <div class="col-md-9">
          <div class="form-group">
            <label for="nama">Nama:</label>
            <select class="form-control" id="nama">
              <option>John Doe</option>
            </select>
              <label for="nama">Posisi:</label>
              <select class="form-control" id="nama">
                <option>1</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 col-md-offset-9">
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>

      </form>
    </div>
  </div>
</div>
