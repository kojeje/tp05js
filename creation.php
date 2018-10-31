<?php
/**
 * Created by PhpStorm.
 * User: poulpy
 * Date: 30/10/2018
 * Time: 15:01
 */



// ON AFFECTE LES VARIABLES aux inputs du formulaire
    //nom
$nom = $_POST['last_name'];
    //prénom
$prenom = $_POST['first_name'];
    //email
$email = $_POST['email'];
    //password
$password = $_POST['password'];
//array sur $fails
$fails = [];
// Si $nom vide
if (empty($nom)) {
    //array_push
    $fails[] = "nom";
}

// SI $orenom vide
if (empty($prenom)) {
    //array_push
    $fails[] = "prénom";
}
// SI *email vide
if (empty($email)) {
    //array_push
    $fails[] = "email";
}
if (empty($password)) {
    //array_push
    $fails[] = "mot de passe";
}
//Si il y a des item dans $fails
if (count($fails) > 0) {
    echo "Vous devez remplir le(s) champ(s) ";

    foreach($fails as $fail) {
        echo $fail . " ";
    }
    echo ".";
} else {

    $connexionBdd = mysqli_connect('localhost', 'root', 'root', 'connexion');
    mysqli_set_charset($connexionBdd, 'utf8');


    $requete = "INSERT INTO user_list VALUES (null, '$prenom', '$nom', null, '$email', '$password')";

    $query = mysqli_query($connexionBdd, $requete);

    echo !$query ? "Impossible de créer votre compte" : "Bravo";
//header('Location: connexion.php');
}
?>

