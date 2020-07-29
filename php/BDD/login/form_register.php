<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
</head>
<body>
    <p id="message">
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </p>
    <form action="register.php" method="post">
        <p>
            <label for="username">Pseudo</label>
            <input type="username" name="username" required>
        </p>
        <p>
            <label for="email">E-mail</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" minlength="8" required>
        </p>
        <p>
            <label for="password_r">Répetez le mot de passe</label>
            <input type="password" name="password_r" minlength="8" required>
        </p>
        <p>
            <label for="cgu"><input type="checkbox" id="cgu" name="cgu" required>J'accepte, ouais !</label>
        </p>
        <p>  
            <input type="submit" value="S'inscrire">
        </p>
    </form>
</body>
</html>