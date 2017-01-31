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


<?php 
//mise à jour
	if(isset($_POST['titre_formation'])){

		$titre_formation = addslashes($_POST['titre_formation']);
		$date_formation = addslashes($_POST['date_formation']);
    $description_formation = addslashes($_POST['description_formation']);
		$id_formation = addslashes($_POST['id_formation']);

		$pdoCV -> exec(" UPDATE formations SET titre_formation = '$titre_formation', date_formation = '$date_formation', description_formation= '$description_formation' WHERE id_formation = '$id_formation' ");

		header("location: formation.php");
		exit();
	}

//récupération
		$id_formation = $_GET['id_formation'];
		$sql = $pdoCV -> query(" SELECT * FROM formations WHERE id_formation = '$id_formation' ");
		$resultat = $sql -> fetch(); 

?>
 
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier formation CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
      <header>
      	<h1>Page de Modification des Formations</h1>

        <?php include 'navAdmin.php'; ?>
      </header>
       
      <section>

        <form type="text" method="POST">
          <table>
            
            <thead>
              <th colspan="2">Formation sélectionnée :</th>
            </thead>
            
            <tbody>
              <tr>
                <td><label>Formation</label></td>
                <td><input type="text" name="titre_formation" value="<?= $resultat['titre_formation']; ?>" /></td>
              </tr>

              <tr>
                <td><label>Date</label></td>
                <td><input type="text" name="titre_formation" value="<?= $resultat['date_formation']; ?>" /></td>
              </tr>

              <tr>
                <td><label>Description</label></td>
                <td><textarea name="description_formation" cols="50" rows="10"><?= $resultat['description_formation']; ?></textarea></td>  
              </tr>
            	
              <input hidden name="id_formation" value="<?= $resultat['id_formation']; ?>" />

              <tr>
                <td colspan="2"><input type="submit" value="Mise à jour" /></td>
              </tr> 			
            </tbody>
         
          </table>
        </form> 
      
      </section>

      <footer>
        <!-- faire le include du footer -->
      </footer>
	</body>
</html>





