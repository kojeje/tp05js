<?php
/**
 * Created by PhpStorm.
 * User: poulpy
 * Date: 30/10/2018
 * Time: 13:46
 */

    $email = $_POST['email'];
    $password = $_POST['password'];

    $fails = [];

    if (empty($email)) {
       $fails[] = "email";
    }

    if (empty($password)) {
        $fails[] = "password";
        array_push($fails, "password");
    }

    if (count($fails) > 0) {
        echo "Le(s) champ(s) ";
        foreach ($fails as $fail) {
            echo $fail . " ";
        }
        echo "est/sont vide(s)";
    } else {

        $connexionBdd = mysqli_connect('localhost', "root", "root");
        mysqli_set_charset($connexionBdd,"utf8");
        $selectionBase = mysqli_select_db($connexionBdd,"tp04");

        $requete = "SELECT firstname, lastname 
        FROM users 
        WHERE email = \"$email\" 
        AND password = \"$password\"
        LIMIT 1";

        $query = mysqli_query($connexionBdd,$requete);
        $result = mysqli_fetch_assoc($query);

        if(is_array($result)) {
            echo "Bonjour ". $result['firstname'] . " " . $result['lastname'];
        } else {

            $requete_email = "SELECT COUNT(*)
            FROM users
            WHERE email = \"$email\"";
            $query_email = mysqli_query($connexionBdd,$requete_email);
            $result_email = mysqli_fetch_row($query_email);

            /*if ($result_email[0] == "1") {
                echo "Le mot de passe correspondant à cet email n'est pas correct";
            } else {
                echo "L'email n'existe pas, veuillez créer votre compte";
            }*/

            // équivalent, en opérateur ternaire à

            echo ($result_email[0] == "1")
                ? "Le mot de passe correspondant à cet email n'est pas correct"
                : "L'email n'existe pas, veuillez créer votre compte";

        }

    }