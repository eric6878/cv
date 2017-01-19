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
if(isset($_POST['titre_xp'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['titre_xp']!= '' && $_POST['date_xp']!= '' && $_POST['description_xp']!= ''){//si compétence n'est pas vide
     $titre_xp = addslashes($_POST['titre_xp']);
     $date_xp = addslashes($_POST['date_xp']);
     $description_xp = addslashes($_POST['description_xp']);
     $id_xp = addslashes($_POST['id_xp']);
    
    $pdoCV->exec(" INSERT INTO experiences VALUES (NULL,'$titre_xp', '$date_xp', '$description_xp') ");
        header("location: experience.php");
        exit();
    }
}

if(isset($_GET['id_xp'])){
    $sql = 'DELETE FROM experiences WHERE id_xp = "' . $_GET['id_xp'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('Location: experience.php');
}
?>

<html lang="fr">
  <head> 
    <?php 
      $sql = $pdoCV->query("SELECT * FROM utilisateurs, experiences");
      $resultat = $sql->fetch();
   	?>
   	<meta charset="UTF-8" />
    <title>Expériences CV web <?php echo $resultat['prenom'] .' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../ckeditor/ckeditor.js"></script>
  </head>

  <body>
      <header>
      	
        <?php //include("admin_menu.php"); ?> <!-- FAUT CREER LA PAGE MENU -->

        <h1>Page : Expériences</h1>
     
      </header>
       
      <section>

      <?php 
      $sql = $pdoCV -> query("SELECT * FROM experiences");
      $sql -> execute();
      $nbr_experiences = $sql -> rowCount(); ?>
    
      <p>Il y a <?php echo $nbr_experiences; ?> expériences dans votre BDD.</p>

      <form action="experience.php" method="POST">
       		<table>
       			<tr>
              	<td>Titre</td> 
                <td><input type="text" name="titre_xp" size="50" required /></td>
            </tr>
                
            <tr>
              <td>Date</td> 
              <td><input type="text" name="date_xp" size="50" required /></td>                          
            </tr>

            <tr>
              <td>Description</td> 
              <td><textarea name="description_xp" id="editor1" cols="50" rows="10" required /></textarea>
                <script>
                          /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
                  CKEDITOR.replace( 'editor1' );

                </script>
              </td>
            </tr>
           
            <tr>
              <td>Valider en BDD =></td>
   				    <td><input type="submit" value="Insérer en BDD" /></td>
				      </tr>
   			  </table>
        </form>
        
        <p>Liste des expériences</p>
        <table>
          <thead>
            <th>Titre</th>
            <th>Date</th>
            <th>Description</th>
            <th>Modification</th>
            <th>Suppression</th>
          </thead>                                 
            
            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
            <td><?php echo $resultat['titre_xp']; ?></td>                                
            <td><?php echo $resultat['date_xp']; ?></td>                
            <td><?php echo $resultat['description_xp']; ?></td>                               
            <td><a href="modif_experience.php?id_xp=<?= $resultat['id_xp']; ?>">Modifier</a></td> 
            <td><a href="experience.php?id_xp=<?= $resultat['id_xp']; ?>">Supprimer</a></td>
          </tr>
       			
            <?php };?>
     
          </tr> 
        </table>
      </section>

     <footer>
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>