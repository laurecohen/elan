<?php

/* Exercice 2
Affichage : La phrase « Notre formation DL commence aujourd’hui » contient 5 mots. */
$str = "Notre formation DL commence aujourd'hui";
$str2 = "La phrase « $str » contient ".str_word_count($str)." mots. <br>";
echo $str2;