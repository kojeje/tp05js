<html>
    <body>
        <h1>Formulaire d'inscription</h1>
        <form action="creation.php" method="post">

            <div>
                <label for="email">Email</label>
                <input name="email" type="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" type="password">
            </div>
            <div>
                <label for="first_name">Prénom</label>
                <input name="first_name" type="text">
            </div>
            <div>
                <label for="last_name">Nom</label>
                <input name="last_name" type="text">
            </div>

            <input type="submit" value="Inscription" />

            <a href="connexion.php">ou connectez-vous</a>


        </form>
    </body>
</html>