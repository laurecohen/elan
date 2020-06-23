<?php

/* Exercice 3
Affichage : La phrase « Notre formation DL commence demain » contient 5 mots. */
$str = "Notre formation DL commence aujourd'hui";
$str2 = "La phrase « $str » contient ".str_word_count($str)." mots. <br>";
echo $str2;

$str3 = str_replace("aujourd'hui", "demain", $str2);
echo $str3; 