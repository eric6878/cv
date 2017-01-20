
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

<!-- MISE A JOUR D'UNE COMPETENCE -->

<?php 

//mise à jour

if(isset($_POST['utilisateur'])){
	$id_utilisateur = $_POST['id_nom'];
  $nom_utilisateur = addslashes($_POST['nom']);
	
	$pdoCV -> exec(" UPDATE utilisateurs SET nom = '$nom_utilisateur', prenom = '$prenom_utilisateur', nom = '$prenom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', nom = '$nom_utilisateur', WHERE id_utilisateur = '$id_utilisateur' ");

	header("location: utilisateur.php");
		exit();
}
//récupération
	$id_utilisateur = $_GET['id_utilisateur'];
	$sql = $pdoCV -> query("SELECT * FROM utilisateurs WHERE id_ = '$id_competence' ");
	$ligne_competence = $sql -> fetch(); 
?>
   
<html lang="fr"><!--  -->
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier compétence CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	<h1>Page de modification des Compétences</h1>

          <?php include 'navAdmin.php'; ?>
        </header>
         
        <section>

        <form action="utilisateur.php" method="POST">
        	<label>Compétence sélectionnée :</label>
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
        <input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
   			<input type="text" name="nom" value="<?= $ligne_competence['competence']; ?>" />
		
   			<input type="submit" value="Mise à jour" />
        </form>
          


        </section>

       <footer id="footerXp">
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>

