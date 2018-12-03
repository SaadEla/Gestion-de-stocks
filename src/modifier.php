<!DOCTYPE html>
<head>
      <title>Modifier</title>
      <link rel="stylesheet" href="rek.css" type="text/css">
</head>
<body style="background-image:url('http://www.reseaugio.fr/media/img_backtrouvez__065768900_1034_07112014.jpg')" >
<div class="ent">
  <a href="produit.php"><img id="home" src="http://images.gofreedownload.net/rounded-blue-home-button-26731.jpg"></a>
</div>
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
        public function __construct()
        {
          parent::__construct();
        }
    
        public function getData($query)
        {        
          $result = $this->connection->query($query);
          if ($result == false) {
            return false;
          } 
          $rows = array();
          while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
          }
        return $rows;
        }    
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
        public function escape_string($value)
        {
          return $this->connection->real_escape_string($value);
        }
      }
    ?>
    <?php
    /*

      $crud = new Crud();
      $id = $crud->escape_string($_GET['id']);
      $result = $crud->getData("SELECT * FROM produit WHERE id=$id");
      foreach ($result as $res) {
        $Produit = $res['Produit'];
        $Numero_Produit = $res['Numero_Produit'];
        $Quantite = $res['Quantite'];
        $Prix_Unit = $res['Prix_Unit'];
      }
      */
    ?>
<form class="modification" action='' method="POST" align="center">
      <?php
      $crud = new Crud();
      if(isset($_POST['Produit']) && isset($_POST['Numero_Produit']) && isset($_POST['Quantite']) && isset($_POST['Prix_Unit'])) {    
      $Produit = $crud->escape_string($_POST['Produit']);
      $Numero_Produit = $crud->escape_string($_POST['Numero_Produit']);
      $Quantite = $crud->escape_string($_POST['Quantite']);
      $Prix_Unit = $crud->escape_string($_POST['Prix_Unit']);
      $id = $crud->escape_string($_GET['id']);
      $result = $crud->execute("UPDATE produit SET Produit='$Produit', Numero_Produit='$Numero_Produit', Quantite='$Quantite', Prix_Unit='$Prix_Unit' WHERE id=$id");
      }
    ?>
</form>
<footer>
  <div class="row" align="center">
    <p id="test">Copyright &copy; SCRach 2018.All Rights Reserved</p>
  </div>
</footer>
</body>
      <?php
      if(isset($_POST['Produit']) && isset($_POST['Numero_Produit']) && isset($_POST['Quantite']) && isset($_POST['Prix_Unit'])) {    
      $Produit = $crud->escape_string($_POST['Produit']);
      $Numero_Produit = $crud->escape_string($_POST['Numero_Produit']);
      $Quantite = $crud->escape_string($_POST['Quantite']);
      $Prix_Unit = $crud->escape_string($_POST['Prix_Unit']);
      $result = $crud->execute("UPDATE stock SET produit='$Produit', quantite='$Quantite', prix_unit='$Prix_Unit'");
      }
    ?>
<?php header("location:./produit.php"); ?>


