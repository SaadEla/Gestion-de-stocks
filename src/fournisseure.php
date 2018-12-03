<!DOCTYPE html>
<head>
      <title>Fournisseur</title>
      <link href="bootstrap.min.css" rel="stylesheet">
      <link href="simple-sidebar.css" rel="stylesheet">
      <link rel="stylesheet" href="tab.css" type="text/css">
      <link rel="stylesheet" href="acc.css" type="text/css">
      
</head>
<body style="background-image:url('http://www.supermarchesmatch.fr/themes/smatch/img/magasin.png')" >
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="acc.php">
                        Menu
                    </a>
                </li>
                <li>
                    <a href="produit.php">Produit</a>
                </li>
                <li>
                    <a href="fournisseur.php">Fournisseur</a>
                </li>
                <li>
                    <a href="stock.php">Stock</a>
                </li>
                <li>
                    <a href="#">Statistiques</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle"  id="menu-toggle"><img id="menu" src="https://image.freepik.com/icones-gratuites/courbe-pointe-de-fleche-a-gauche_318-10099.jpg"></a>
            </div>
        </div>

    </div>
        <div class="sc1" align="center">
            <p id="titre">Table Fournisseur</p>
            <table>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
                ?>
                <tr>
                  <th><strong>Produit</strong></th>
                  <th><strong>Numero Produit</strong></th>
                  <th><strong>Quantite</strong> </th>
                  <th><strong>Prix_Unit</strong> </th>
                </tr>
                <?php
                $reponse = $bdd->query('SELECT * FROM Fournisseur');
                while ($donnees = $reponse->fetch())
                {
                ?>
                  <tr align="center">
                    <td><?php echo $donnees['produit']; ?></td>
                    <td><?php echo $donnees['n_produit']; ?></td>
                    <td><?php echo $donnees['qtite']; ?></td>
                    <td><?php echo $donnees['prix_u']; ?></td>
                    <td id="buttonmod"><?php echo "<a href=\"Accepter Offre.php?id=$donnees[id]\">";?><span><strong>Accepter</strong></span></a></td>
                    <td id="buttonsup"><?php echo "<a href=\"supprimerf.php?id=$donnees[id]\">";?><span><strong>Rejeter</strong></span></a></td>
                 </tr>
                <?php
                }
                $reponse->closeCursor(); 
                ?>
            </table>
        <div class="btn">
          <ul class="btn-tab">
            <a href="ajoutf.php"><strong><span>Ajouter</strong></span></a>
          </ul>
        </div>
    </div>
        <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <footer>
            <div class="row" align="center">
               <p id="test">Copyright &copy; SCRach 2018.All Rights Reserved</p>
            </div>
    </footer>
</body>

