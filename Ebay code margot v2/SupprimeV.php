<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title>  Ebay ECE </title>
    <link href="admin.css" rel="stylesheet" type="text/css"/>
</head>

<body>    
    <div id="main_wrapper">
<!-- Balise qui englobe tout le contenu permettant de fixer les dimensions de la page -->
        <header>
            <div id="titre_principal">
                <h1> EBAY ECE</h1>
                <div id="logo">
                 <img src="logoEbayECE.jpg" alt="Ebay ECE"  />
                </div>
            </div>
            <nav>
                <ul >
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html" class="Vendre"> Vendre </a></li>
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php"> Panier </a></li>
                <li> <a href="admin.php"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
            
            <h1 class="TitreAdmin"> Supprimer un vendeur d'EbayECE </h1>
            <h3 class="soustitresup"> Liste des vendeurs : </h3>
<?php
            session_start();	
$database = "projet" ;

//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);

  if($db_found)
{
    if (isset($_POST['Sup'])) {

            $sql = "SELECT * FROM compte";
                if ($nom != "") {
                    $sql .= " WHERE nom LIKE '%$nom%'";
                        if ($prenom != "") {
                        $sql .= " AND prenom LIKE '%$prenom%'";
                            }
                    }
                $result = mysqli_query($db_handle, $sql);
                if (mysqli_num_rows($result) == 0) {
                //Vendeur inexistant
                echo "Vendeur not found. <br>";
                }
                else {
                while ($data = mysqli_fetch_assoc($result) ) {
                $id = $data['ID'];
                echo "<br>";
                }
                $sql = "DELETE FROM compte";
                $sql .= " WHERE ID = $id";
                $result = mysqli_query($db_handle, $sql);
                echo "Delete successful. <br>";
                //on affiche la liste des vendeurs restants
                $sql = "SELECT * FROM compte";
                $result = $result = mysqli_query($db_handle, $sql);
                echo "Les vendeurs restants sont : <br>";
                while ($data = mysqli_fetch_assoc($result)) {
                echo "ID: " . $data['ID'] . "<br>";
                echo "Nom: " . $data['nom'] . "<br>";
                echo "Prenom: " . $data['prenom'] . "<br>";
                echo "Email: " . $data['mail'] . "<br>";
                echo "Pseudo: " . $data['pseudo'] . "<br>";
                echo "<br>";
                }
                }
                else {
            echo "Database not found";
                    }
            }
  }

        //fermer la connexion
        mysqli_close($db_handle);
        ?>

       
    </table>
    </form>

        </section>
                <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
