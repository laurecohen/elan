<?php
    /**
     * Fonction pour afficher la note sous forme d'étoiles
     */
    function displayRating(int $value = NULL){
        $result = '';

        // Si $note n'est pas NULL
        if ($value){
            for($n = 1; $n <= $value; $n++) {
                // Ajouter une étoile remplie à chaque tour de boucle
                $result .= '<span uk-icon="star" class="checked uk-text-top"></span>';
            }
            while ($n <= 5) {
                // Ajouter des étoiles vides (jusqu'à 5) à la fin
                $result .= '<span uk-icon="star" class="uk-text-top"></span>';
                $n++;
            }

            $result .= ' <span class="uk-text-small uk-text-bold uk-text-muted uk-text-top">'.$value.'</span>';
        } else {
            for($n = 1; $n <= 5; $n++) {
                // Ajouter une étoile remplie à chaque tour de boucle
                $result .= '<span uk-icon="star"></span>';
            }
        }
        return $result;
    }