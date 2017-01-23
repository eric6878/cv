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
//Insertion
if(isset($_POST['titre_xp'])){
  if($_POST['titre_xp']!='' && $_POST['date_xp']!='' && $_POST['description_xp']!=''){
    $titre_xp = addslashes($_POST['titre_xp']);
    $date_xp = addslashes($_POST['date_xp']);
    $description_xp = addslashes($_POST['description_xp']);
    
    $pdoCV->exec(" INSERT INTO experiences VALUES (NULL, '$titre_xp', '$date_xp', '$description_xp') ");
    header("location: experience.php");
    exit();
  }
}
//Suppression
if(isset($_GET['id_xp'])){
  $eraser = $_GET['id_xp'];
  $sql = " DELETE FROM experiences WHERE id_xp = '$eraser' ";
  $pdoCV -> query($sql);
  header('location: experience.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Expériences CV web <?= $_POST['prenom'] . $_POST['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
  </head>
  
  <body>
    <header>
      <h1>Page Expériences Numériques</h1>

      <?php include 'navAdmin.php'; ?>
    </header>

    <section>
      <?php 
    
      $sql = $pdoCV -> query("SELECT * FROM experiences");
      $sql -> execute();
      $nbr_xp = $sql -> rowCount();
    
      ?>
      
      <p>Il y a <?php echo $nbr_xp; ?> compétences dans votre BDD.</p>
      
      <form method="POST">
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
              <td></td>
              <td><input type="submit" value="Insérer en BDD" /></td>
              </tr>
          </table>
        </form>
      
      <table>
        <thead>
          <th>Expériences</th>
          <th>Date</th>
          <th>Description</th>
          <th>Modification</th>
          <th>Suppression</th>
        </thead>
        <tr>
          <?php while($ligne = $sql -> fetch()){ ?>
          <td><?php echo $ligne['titre_xp']; ?></td>
          <td><?php echo $ligne['date_xp']; ?></td>
          <td><?php echo $ligne['description_xp']; ?></td>
          <td><a href="modif_experience.php?id_xp=<?= $ligne['id_xp']; ?>">Modifier</a></td>
          <td><a href="experience.php?id_xp=<?= $ligne['id_xp']; ?>">Supprimer</a></td>
        </tr>
          <?php } ?>
       </table>
    </section>

    <footer>
      <!-- faire le include du footer -- >
    </footer>
  </body>
</html>