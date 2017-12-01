<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Organizer Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="./jquery.tablesorter.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <script>

  $(document).ready(function(){
      // Bootstrap tooltip, https://www.w3schools.com/bootstrap/bootstrap_tooltip.asp
        $('.btn-watch').tooltip();
      // http://tablesorter.com/docs/
        $(".tablesorter").tablesorter();
  });




  </script>
</head>
<body>

<div class="container">
  <div class="text-center">
    <h1>Event Organizer Management System</h1>
    <h3 class="border-show">Bima, Evans, Grace, Yuan - 3115100??, 311710008, 311710010, 3115100??</h3>
  </div>
  <div class="col-xs-12 col-sm-3">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav">
              <li>
                <a href="#">Data Master</a>
                <ul class="nav padder">


                 <li><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li><a href="bagian.php">Bagian</a></li>
                 <li><a href="personal.php">Personal</a></li>
               </ul>
             </li>
              <li class="active"><a href="entry-honor.php">Entry Honor</a></li>
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
