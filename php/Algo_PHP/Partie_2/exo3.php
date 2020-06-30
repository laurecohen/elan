<?php
    /* Afficher un lien hypertexte permettant d’accéder au site d’Elan Formation. 
    Le lien devra s’ouvrir dans un nouvel onglet (_blank). */
    
    $url = "'https://elan-formation.eu/'"; 
    $site_title = "Elan Formation";
    $target= "'_blank'";
    
    echo "<a href=$url target=$target>$site_title</a>";
?>