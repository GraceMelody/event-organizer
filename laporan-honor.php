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
