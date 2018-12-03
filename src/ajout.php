<!DOCTYPE html>
<html>

<head>
  <title>Sc-Supermarche</title>
  <!-- Bootstrap core CSS-->
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sb-admin.css" rel="stylesheet">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E31A5A6D-362C-6040-895F-BD420B6876D4/main.js" charset="UTF-8"></script></head>
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
    <?php
      class DbConfig 
      {    
        private $_host = 'localhost';
        private $_username = 'root';
        private $_password = '';
        private $_database = 'pfa';
        protected $connection;
        public function __construct()
        {
          if (!isset($this->connection)) {
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
          }    
        return $this->connection;
        }
      }
      class Crud extends DbConfig
      {
        public function execute($query) 
        {
          $result = $this->connection->query($query);
          if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
          } 
          else {
            return true;
          }        
        }
      }
      ?>
    <form class="insertion" action='' method="POST">
      <table border="0" align="center" cellspacing="2" cellpadding="2">
          <tr align="center">
             <td>Produit</td>
             <td><input type="text" name="Produit" ></td>
          </tr>
          <tr align="center">
             <td>Numero Produit</td>
             <td><input type="integer" name="Numero_Produit" ></td>
          </tr>
          <tr align="center">
             <td>Quantite</td>
             <td><input type="integer" name="Quantite" ></td>
          </tr>
          <tr align="center">
             <td>Prix_Unit</td>
             <td><input type="integer" name="Prix_Unit" ></td>
          </tr>
          <tr align="center">
             <td colspan="2"><input type="submit" value="Ajouter" name="valider"></td>
          </tr>
      </table>
      <?php
      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
      }
      catch(Exception $e)
      {
        die('Erreur : '.$e->getMessage());
      }
      $crud=new crud();
      if(isset($_POST["valider"])){
      $Produit= $_POST["Produit"] ;
      $Numero_Produit= $_POST["Numero_Produit"] ;
      $Quantite= $_POST["Quantite"] ;
      $Prix_Unit= $_POST["Prix_Unit"] ;
      $result = $bdd->prepare("INSERT INTO `produit`(`Produit`, `Numero_Produit`, `Quantite`, `Prix_Unit`) VALUES (:Produit,:Numero_Produit,:Quantite,:Prix_Unit)");
      $result->execute(array(
        'Produit'=>$Produit,
        'Numero_Produit'=>$Numero_Produit,
        'Quantite'=>$Quantite,
        'Prix_Unit'=>$Prix_Unit,
        ));
      }
      ?>
  </form>
</div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SC-Rachid</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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
    <?php
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
    $crud=new crud();
    if(isset($_POST["valider"])){
    $Produit= $_POST["Produit"] ;
    $Numero_Produit= $_POST["Numero_Produit"] ;
    $Quantite= $_POST["Quantite"] ;
    $Prix_Unit= $_POST["Prix_Unit"] ;
    $result = $bdd->prepare("INSERT INTO `stock`(`produit`, `quantite`, `prix_unit`) VALUES (:Produit,:Quantite,:Prix_Unit)");
    $result->execute(array(
      'Produit'=>$Produit,
      'Quantite'=>$Quantite,
      'Prix_Unit'=>$Prix_Unit
      ));
    }
    ?>