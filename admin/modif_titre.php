
<?php require '../connexion/connexion.php'; ?>

<?php

// pour se connecter :
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
}
else{
  header('location: authentification.php');
}


// pour se deconnecter : 

if(isset($_GET['deconnexion'])){
  $_SESSION['connexion'] = '';
  $_SESSION['id_utilisateur'] = '';
  $_SESSION['prenom'] = '';
  $_SESSION['nom'] = '';

  unset($_SESSION['connexion']);
  session_destroy();
  header('location: ../index.php');
}

?>



<!-- MISE A JOUR D'UN TITRE -->

<?php 

  if(isset($_POST['titre_titre'])){
    $titre_titre = $_POST['titre_titre'];
    $categorie_titre = $_POST['categorie_titre'];
  	$id_titre = $_POST['id_titre'];
  	$pdoCV -> exec(" UPDATE titres SET titre_titre = '$titre_titre', categorie_titre = '$categorie_titre' WHERE id_titre = '$id_titre' ");

  	header("location: titre.php");
  		exit();
}

//récupération

	$id_titre = $_GET['id_titre'];
	$sql = $pdoCV -> query("SELECT * FROM titres WHERE id_titre = '$id_titre' ");
	$resultat = $sql -> fetch(); 
?>
   
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier titres CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <script src="../ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	
          <h1> Page de Modification des Titres</h1>

          <?php include 'navAdmin.php'; ?>

        </header>

        <section>
            <form method="POST">
            <table>
            
              <thead>
                <th colspan="2">Titre sélectionné :</th>
              </thead>
              
              <tbody>
                <tr>
                  <td>Titre</td>
                  <td><input type="text" name="titre_titre" value="<?= $resultat['titre_titre']; ?>" /></td>
                </tr>

                <tr>
                  <td>Catégorie</td>
                  <td><input type="text" name="categorie_titre" value="<?= $resultat['categorie_titre']; ?>" /></td>
                </tr>
            	  
          		  <input hidden name="id_titre" value="<?= $resultat['id_titre']; ?>" /> 
                
                <tr>
                  <td colspan="2"><input type="submit" value="Mise à jour" /></td>
                </tr>			
              </tbody>
            
            </table>
	          </form>    
         
        </section>

        <footer>
            <!-- faire le "include" du footer -->
        </footer>
	</body>
</html>