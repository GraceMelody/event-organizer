<!DOCTYPE html>
<html lang="en">
<?php require('html-header.html') ?>
<body>

  <nav class="navbar navbar-inverse topnav-styler">
  <div class="container-fluid topnav-styler">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">EOMS</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li><a>Welcome, <?php username() ?>.</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
  </nav>
<div class="container">


  <div class="col-xs-12 col-sm-3">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse s" id="myNavbar">
            <ul class="nav">
