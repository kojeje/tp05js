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
                <label for="firstname">Prénom</label>
                <input name="firstname" type="text">
            </div>
            <div>
                <label for="lastname">Nom</label>
                <input name="lastname" type="text">
            </div>

            <input type="submit" value="Inscription" />

            <a href="connexion.php">ou connectez-vous</a>


        </form>
    </body>
</html>