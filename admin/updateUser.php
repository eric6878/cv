
<?php require '../connexion/connexion.php'; ?>

<?php

echo '<p>';
echo $_POST['utilisateur'];
echo  '</p>';

$sql = ' UPDATE utilisateurs SET prenom = "'.$_POST['utilisateur'].'" ';

                                           die($sql);




?>