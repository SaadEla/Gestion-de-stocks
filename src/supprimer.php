<!DOCTYPE html>
<head>
      <title>Supprimer</title>
      <link rel="stylesheet" href="rek.css" type="text/css">
</head>
<body style="background-image:url('https://www.lokad.com/Themes/Lokad2/freshfood-images/fresh.png')" >
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
        public function delete($id, $table) 
        { 
          $query = "DELETE FROM $table WHERE id = $id";
          $result = $this->connection->query($query);
          if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
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
      }
    ?>
  <?php
  $crud = new Crud();
  $id = $crud->escape_string($_GET['id']);
  $result = $crud->delete($id, 'produit');
  $result = $crud->delete($id, 'stock');
  ?>
  <h1 align="center">Votre ligne a ete supprimée</h1>
<footer>
  <div class="row" align="center">
    <p id="test">Copyright &copy; SCRach 2018.All Rights Reserved</p>
  </div>
</footer>
<?php header("location:./produit.php"); ?>
</body>