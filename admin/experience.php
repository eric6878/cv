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

    <!-- Custom Fonts -->
    <link href="../cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <!-- Mon style CSS -->
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
  </head>
  
  <body>
    <header>
      <h1>Page des Expériences Numériques</h1>

      <?php include 'navAdmin.php'; ?>
    </header>

    <section>
      <?php 
    
      $sql = $pdoCV -> query("SELECT * FROM experiences");
      $sql -> execute();
      $nbr_xp = $sql -> rowCount();
    
      ?>
      
      <p>Il y a <?php echo $nbr_xp; ?> expérience(s) dans votre BDD.</p>
      
      <form method="POST">
          <table>
            <thead>
              <th colspan="3">Insérer une nouvelle expérience :</th>
            </thead>
            <tbody>
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
                <td>
                  <textarea name="description_xp" cols="50" rows="10" required />Votre description...</textarea>
                </td>
              </tr> 
              <tr>
                <td colspan="3"><input type="submit" value="Valider" /></td>
              </tr>
            </tbody>
          </table>
        </form>
      
      <table>
        <thead>
          <th>Expérience</th>
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
          <td><a href="modif_experience.php?id_xp=<?= $ligne['id_xp']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td>
          <td><a href="experience.php?id_xp=<?= $ligne['id_xp']; ?>"><i class="fa fa-trash-o"></i></a></td>
        </tr>
          <?php } ?>
       </table>
    </section>

    <footer>
      <!-- faire le include du footer -- >
    </footer>
  </body>
</html>