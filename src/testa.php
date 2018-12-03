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
          <h2>Transfert Fournisseur</h2></div>
        <form class="insertion" action='' method="POST">
          <table border="0" align="center" cellspacing="2" cellpadding="2">
              <tr align="center">
                 <td>Numero Fournisseur</td>
                 <td><input type="integer" name="enumero_fournisseurp" ></td>
              </tr>
              <tr align="center">
                 <td name="etelephone_fournisseurp">Telephone Fournisseur</td>
                 <td>
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
                    $enumero_fournisseur= $_POST["enumero_fournisseurp"] ;
                   }
                    $reponse = $bdd->query("SELECT etelephone_fournisseur FROM fournisseur WHERE Fnumero='$enumero_fournisseur' ");
                    $reponse->execute();
                    $donnees = $reponse->fetch();
                    $reponse->closeCursor();
                    if ($donnees){$telfour=$reponse;}
                  ?>

                 </td>
              </tr>
              <tr align="center">
                 <td>Nom Fournisseur</td>
                 <td><input type="integer" name="nom" ></td>
              </tr>
              <tr align="center">
                 <td>date</td>
                 <td><input id="datepicker" type="text" name="edate" size="21" /></td>
              </tr>
              <tr align="center">
                 <td colspan="2"><input type="submit" value="Ajouter" name="valider"></td>
              </tr>
          </table> 
          <!--Inserer dans fournisseur et executer des tests -->
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
            $eproduit= $_POST["eproduit"] ;
            $equantite= $_POST["equantite"] ;
            $eprix_unit= $_POST["eprix_unit"] ;
            $enumero_fournisseur= $_POST["enumero_fournisseurp"] ;
            $etelephone_fournisseur= $_POST["etelephone_fournisseurp"] ;
            $edate= $_POST["edate"] ;
            $reponse = $bdd->query("SELECT Fnumero FROM fournisseur WHERE Fnumero='$enumero_fournisseur' ");
            $reponse->execute();
            $donnees = $reponse->fetch();
            $reponse->closeCursor();
          if ($donnees){
              $result = $bdd->prepare("INSERT INTO `entrees`(`eproduit`, `equantite`,`eprix_unit`, `enumero fournisseur`, `etelephone fournisseur`,`edate`) VALUES (:eproduit,:equantite,:eprix_unit,:enumero_fournisseur,:etelephone_fournisseur,:edate)");
              $result->execute(array(
                'eproduit'=>$eproduit,
                'equantite'=>$equantite,
                'eprix_unit'=>$eprix_unit,
                'enumero_fournisseur'=>$enumero_fournisseur,
                'etelephone_fournisseur'=>$etelephone_fournisseur,
                'edate' =>$edate
                ));
          }
          else{
            ?>
            <p><h3 align="center">Numero Fournisseur Invalide !</h3></p>
            <?php
            }
          }
          ?>
        </form>
<!--AFFICHAGE dans la table fournisseur-->
        <div class="card-body">
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
                  <th><strong>Numero Fournisseur</strong> </th>
                  <th><strong>Telephone Fournisseur</strong> </th>
                  <th><strong>date</strong> </th>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM entrees');
                while ($donnees = $reponse->fetch())
                {
                  ?>
                  <tr align="center">
                    <td><?php echo $donnees['eproduit']; ?></td>
                    <td><?php echo $donnees['equantite']; ?></td>
                    <td><?php echo $donnees['eprix_unit']; ?></td>
                    <td><?php echo $donnees['enumero fournisseur']; ?></td>
                    <td><?php echo $donnees['etelephone fournisseur']; ?></td>
                    <td><?php echo $donnees['edate']; ?></td>
                  </tr>
                  <?php
                  }
                  $reponse->closeCursor(); 
                  ?>
                  <!--<div class="btn">
                  <ul class="btn-tab">
                  <a href="ajoutf.php"><strong><span>Ajouter</strong></span></a>
                  </ul>
                  </div>-->
               </table>
              </div>
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
  </div>
</body>
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

</html>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
 
 
       <link rel="stylesheet" href="style.css" type="text/css" media="all" />
       <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all" />
       <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
 
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>
<!--inserer dans le stock-->
 <?php
    try
    {
      $bdd1 = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
    $crud=new crud();
    if(isset($_POST["valider"]) && !empty($_POST["valider"])  ){
    $eproduit= $_POST["eproduit"] ;
    $equantite= $_POST["equantite"] ;
    $eprix_unit= $_POST["eprix_unit"] ;
     $reponse = $bdd->query("SELECT Fnumero FROM fournisseur WHERE Fnumero='$enumero_fournisseur' ");
    $reponse->execute();
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    if ($donnees){
    $result1 = $bdd1->prepare("INSERT INTO `stock`(`produit`, `quantite`,`prix_unit`) VALUES (:eproduit,:equantite,:eprix_unit)");
    $result1->execute(array(
      'eproduit'=>$eproduit,
      'equantite'=>$equantite,
      'eprix_unit'=>$eprix_unit  
      ));
   }
   }

    ?>
    <!--inserer dans produit-->
 <?php
    try
    {
      $bdd1 = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
    $crud=new crud();
    if(isset($_POST["valider"]) && !empty($_POST["valider"])  ){
    $eproduit= $_POST["eproduit"] ;
    $equantite= $_POST["equantite"] ;
    $eprix_unit= $_POST["eprix_unit"] ;
    $n=111101;
     $reponse = $bdd->query("SELECT Fnumero FROM fournisseur WHERE Fnumero='$enumero_fournisseur' ");
    $reponse->execute();
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    if ($donnees){
    $result1 = $bdd1->prepare("INSERT INTO `produit`(`Produit`,`Numero_Produit`, `Quantite`,`Prix_Unit`) VALUES (:eproduit,:n,:equantite,:eprix_unit)");
    $result1->execute(array(
      'eproduit'=>$eproduit,
      'n'=>$n,
      'equantite'=>$equantite,
      'eprix_unit'=>$eprix_unit  
      ));
   }
   }

    ?>