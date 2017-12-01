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
              <li class="active">
                <a href="#">Data Master</a>
                <ul class="nav padder">


                 <li class="active inner"><a href="wilayah.php">Wilayah</a></li>
                 <li><a href="event.php">Event</a></li>
                 <li><a href="bagian.php">Bagian</a></li>
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
       <form>
         <div class="col-md-11">
          <div class="form-group">

            <label for="nama-wil">Nama:</label>
            <input type="text" class="form-control" id="nama-wil">

            </div>
            </div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-success ">Tambah</button>
          </div>
      </form>
    </div>
  </div>
</div>
