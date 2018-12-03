<?php
require('GoogleMapAPI.class.php');
$map = new GoogleMapAPI('map');
$map->setAPIKey('AIzaSyCQQfEgTJ-_MIWg8Frbr4tkpmbgrkTx1Is');
$map->setWidth("700px");
$map->setHeight("400px");
$map->setCenterCoords ('2', '48');
$map->setZoomLevel (5);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
  <title>Sc-Supermarche</title>
  <?php $map->printHeaderJS(); ?>
  <?php $map->printMapJS(); ?>
  <!-- Bootstrap core CSS-->
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sb-admin.css" rel="stylesheet">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E31A5A6D-362C-6040-895F-BD420B6876D4/main.js" charset="UTF-8"></script>
</head>
  
<body onload="onLoad();" >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="acc.php">SC-Supermarche</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produit">
          <a class="nav-link" href="produit.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Produit</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fournisseur">
          <a class="nav-link" href="fournisseur.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Fournisseur</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clients">
          <a class="nav-link" href="client.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Clients</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stock">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Stock</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="entre.php">Entrees</a>
            </li>
            <li>
              <a href="sortie.php">Sorties</a>
            </li>
            </li>
            <li>
              <a href="stock.php">Stock</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="loc.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Localisation</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
      </br></br>
        <div  class="card-header" align="center">
          <h2>Coordonees</h2></div>
          <div class="row">
        <div class="col-sm-8">
          1
<script type="text/javascript" src="http://www.supportduweb.com/google_map_gen.js?lati=33.984275&long=-6.867233&zoom=19&width=675&height=400&mapType=normal&map_btn_normal=yes&map_btn_satelite=yes&map_btn_mixte=yes&map_small=yes&marqueur=yes&info_bulle=ENSIAS"></script><br /><a href="http://www.supportduweb.com/generateur-cartes-google-maps-mettre-cartes-google-map-sur-son-site-gratuitement-gadget-widget.html"></a>
        </div>
        <div class="col-sm-4">
</br>
                    <p>Telephone:
                        <strong>+212 00000000</strong>
                    </p>
                    <p>Supermarche Xxxxx:
                        <strong><a href=" http://www.lien.ma/">www.lien.ma</a></strong>
                    </p>
                    <p>Addresse:
                        <strong>7,Boulevard de la Résistance  20310 
                            <br>Casablanca,Maroc</strong>
                    </p>
                    <p>
        </div>

        </div>
        <div class="text-center" align="center">
        </br></br></br>
          <h2>Rejoignez Nous sur les réseaux sociaux</h2>
        <div class="row">
          <div class="col-sm-4" <a href="#"><img src="http://openshop.ma/img/cms/iconfb.png"  width="89" height="89"></a></div>
          <div class="col-sm-4"><a href="#"><img src="http://openshop.ma/img/cms/insta.png"  width="89" height="89"></a></div>
          <div class="col-sm-4"><a href="#"><img src="http://openshop.ma/img/cms/twitter.png"  width="89" height="89"></a></div>
        </div>
        </div>
        </br></br></br>      

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SC-Rachid</small>
        </div>
      </div>
    </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="Chart.min.js"></script>
    <script src="jquery.dataTables.js"></script>
    <script src="dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="sb-admin-datatables.min.js"></script>
    <script src="sb-admin-charts.min.js"></script>
  </div>
</body>
  
</html>
