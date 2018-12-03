<!DOCTYPE html>
<html>

<head>
  <title>Sc-Supermarche</title>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Banane', 9],
          ['Lait', 15],
          ['Pomme', 10]
        ]);

        // Set chart options
        var options = {'width':700,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  <!-- Bootstrap core CSS-->
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sb-admin.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="acc.css" type="text/css">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E31A5A6D-362C-6040-895F-BD420B6876D4/main.js" charset="UTF-8"></script>
<style type="text/css">
  .redlabel{background-color:red;}
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
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
    <div class="sc1" align="center" action="ajt.php">
        <div class="card-header">
          <h2>Stock</h2></div>
        <div class="card-body">
            <table>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
                ?>
            <div class="card mb-3">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th><strong>Produit</strong></th>
                  <th><strong>Quantite</strong></th>
                  <th><strong>Prix_Unit</strong></th>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM stock');
                while ($donnees = $reponse->fetch())
                {
                ?>
                  <tr align="center">
                    <td><?php echo $donnees['produit']; ?></td>
                    <td><?php echo $donnees['quantite']; ?></td> 
                    <td><?php echo $donnees['prix_unit']; ?></td> 
                 </tr>
                <?php
                }
                $reponse->closeCursor(); 
                ?>
    
            </table>
          </div>
        </div>
        </br></br></br>
          <div align="center"class="card-header">
          <h2>Suivie du Stock a la date <?php echo date("d/m/Y");?></h2></div>
        <div align="center" id="chart_div"></div>
      </div>
    </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SC-Rachid</small>
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