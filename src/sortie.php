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
  <link href="sb-admin.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="acc.css" type="text/css">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E31A5A6D-362C-6040-895F-BD420B6876D4/main.js" charset="UTF-8"></script></head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
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
          <h2>Transfert Client</h2></div>
        <div class="card-body">
    <form class="insertion" action='' method="POST">
    <table border="0" align="center" cellspacing="2" cellpadding="2">
        <tr align="center">
           <td>Produit</td>
           <td ><select name="select" >
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT * FROM stock');
            while($donnees = $reponse->fetch())
            {
              ?>
               <option  value=<?php echo $donnees['produit'];?> ></option>
            <?php
            }
            $reponse->closeCursor(); 
            ?>
          </select>
          </td>
        </tr>
        <tr align="center">
           <td>Quantite</td>
           <td><input type="integer" name="squantite" ></td>
        </tr>
        <tr align="center">
           <td>Numero Client</td>
           <td><input type="integer" name="snumero_clientp" ></td>
        </tr>
        <tr align="center">
           <td>Telephone Client</td>
           <td><input type="integer" name="stelephone_clientp" ></td>
        </tr>

        <tr align="center">
           <td>date</td>
           <td><input id="datepicker" type="text" name="sdate" size="21" /></td>
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
    if($_POST['select']){
    $sproduit=$_POST['select'];
    }
    $squantite= $_POST["squantite"] ;
    $snumero_client= $_POST["snumero_clientp"] ;
    $stelephone_client= $_POST["stelephone_clientp"] ;
    $sdate= $_POST["sdate"] ;
    $reponse = $bdd->query("SELECT Cnumero FROM client WHERE Cnumero='$snumero_client' ");
    $reponse->execute();
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    if ($donnees){
      $query= $bdd->query("SELECT quantite FROM stock WHERE `produit` = '$sproduit' ");
      $quantite = $query->fetchColumn();
        if($quantite>$squantite){
        $result = $bdd->prepare("INSERT INTO `sorties`(`sproduit`, `squantite`, `snumero client`, `stelephone client` , `sdate` ) VALUES (:sproduit,:squantite,:snumero_client,:stelephone_client,:sdate)");
        $result->execute(array(
          'sproduit'=>$sproduit,
          'squantite'=>$squantite,
          'snumero_client'=>$snumero_client,
          'stelephone_client'=>$stelephone_client,
          'sdate' =>$sdate
          ));
        $nvquantite=$quantite-$squantite;
        $result1=$crud->execute("UPDATE stock SET `quantite`='$nvquantite' WHERE `produit` = '$sproduit'");
        }
      else{
        ?>
        <p><h3 align="center">Rupture de stock !</h3></p>
        <?php
      }
    }
    else{
      ?>
      <p ><h3 align="center">Numero Client Invalide !</h3></p>
      <?php
      }
    }
    ?>
</form>
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
                  <th><strong>Numero client</strong> </th>
                  <th><strong>Telephone client</strong> </th>
                  <th><strong>date</strong> </th>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM sorties');
                while ($donnees = $reponse->fetch())
                {
                ?>
                  <tr align="center">
                    <td><?php echo $donnees['sproduit']; ?></td>
                    <td><?php echo $donnees['squantite']; ?></td>
                    <td><?php echo $donnees['snumero client']; ?></td>
                    <td><?php echo $donnees['stelephone client']; ?></td>
                    <td><?php echo $donnees['sdate']; ?></td>
  
                 </tr>
                <?php
                }
                $reponse->closeCursor(); 
                ?>
        <!--<div class="btn">
          <ul class="btn-tab">
            <a href="ajoutc.php"><strong><span>Ajouter</strong></span></a>
          </ul>
        </div>-->
            </table>
          </div>
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
 
       <link rel="stylesheet" href="style.css" type="text/css" media="all" />
       <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all" />
       <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
 
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>
       <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script> 

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
    $sproduit= $_POST["select"] ;
    $squantite= $_POST["squantite"] ;
    $snumero_client= $_POST["snumero_clientp"] ;
    $stelephone_client= $_POST["stelephone_clientp"] ;
    $reponse = $bdd->query("SELECT Cnumero FROM client WHERE Cnumero='$snumero_client' ");
    $reponse->execute();
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    if ($donnees){
    $query= $bdd->query("SELECT Quantite FROM produit WHERE `Produit` = '$sproduit' ");
    $quantite = $query->fetchColumn();
    if($quantite>$squantite){
    $nvquantite=$quantite-$squantite;
    $result1=$crud->execute("UPDATE Produit SET `Quantite`='$nvquantite' WHERE `Produit` = '$sproduit'");
    }
    }
    }
    ?>