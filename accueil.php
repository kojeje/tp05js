<?php
/**
 * Created by PhpStorm.
 * User: poulpy
 * Date: 30/10/2018
 * Time: 13:46
 */

//Renvoie les valeurs emails et password vers leurs variables
    $email = $_POST['email'];
    $password = $_POST['password'];
//cree table vide
    $fails = [];
// Si champ mail vide
    if (empty($email)) {
        //On attribue la valeur d''email' à $fails
       $fails[] = "email";
    }
// Si champ password vide
    if (empty($password)) {
        //On attribue la valeur d''email' à $fails
        $fails[] = "password";
        // équivalent à
        //array_push($fails, "password");

    }

    if (count($fails) > 0) {
        echo "Le(s) champ(s) ";
        foreach ($fails as $fail) {
            echo $fail . " ";
        }
        echo "est/sont vide(s).";
    } else {
        // Connexion BDD
        $connexionBdd =
            mysqli_connect('localhost', "root", "root");

        mysqli_set_charset($connexionBdd, "utf8");

        $selectionBase =
            mysqli_select_db($connexionBdd, "connexion");



        $requete = "SELECT first_name, last_name
        FROM user_list
        WHERE email = \"$email\"
        AND password = \"$password\"
        LIMIT 1";

        $query = mysqli_query($connexionBdd, $requete);
        $result = mysqli_fetch_assoc($query);


        if (is_array($result)) {

            session_start();

            $_SESSION['first_name'] =
                $result['first_name'];

            $_SESSION['lastname'] =
                $result['lastname'];

            echo "Bonjour ". $result['first_name']
                . " " . $result['last_name'];
            echo "<br/>";
            echo "<a href='article.php'>Aller sur article</a>";
        } else {

            $requete_email = "SELECT COUNT(*)
            FROM user_list
            WHERE email = \"$email\"";
            $query_email = mysqli_query($connexionBdd, $requete_email);
            $result_email = mysqli_fetch_row($query_email);

            /*if ($result_email[0] == "1") {
                echo "Le mot de passe correspondant à cet email n'est pas correct";
            } else {
                echo "L'email n'existe pas, veuillez créer votre compte";
            }*/

            // équivalent, en opérateur ternaire à

            echo ($result_email[0] == "1")
                ? "Le mot de passe correspondant à cet email n'est pas correct"
                : "L'email n'existe pas, <br/> <a href=\"inscription.php\">veuillez créer votre compte</a>";

        }
    }

?>