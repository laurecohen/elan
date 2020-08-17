<?php
    /**
     * Fonction pour afficher la note sous forme d'étoiles
     */
    function displayRating(int $value = NULL){
        $result = '';
        $default = '<span uk-icon="star" class="uk-text-top"></span>';
        $checked = '<span uk-icon="star" class="checked uk-text-top"></span>';
        $stars = 5;

        // Si $note n'est pas NULL
        if ($value){
            $result = str_repeat($checked, $value);

            if ($value <= $stars){
                $result .= str_repeat($default, ($stars - $value));
            }
        } else {
            $value = '-';
            $result = str_repeat($default, $stars);
        }
        return $result .= ' <span class="uk-text-small uk-text-bold uk-text-muted uk-text-top">'.$value.'</span>';
    }