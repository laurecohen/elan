<?php
    session_start();
    unset($_SESSION['user']);
    $_SESSION['success'] = 'Vous êtes correctement déconnecté, à bientôt !';
    header("Location: index.php");