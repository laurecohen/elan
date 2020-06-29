<?php

/* 
Affichage (si $texte = « Mon texte en paramètre »)
MON TEXTE EN PARAMETRE */


function convertirMajRouge($arg){
    return "<p style='color:red'>".mb_strtoupper($arg)."</p>";
}

$str = "élan Formation";
echo convertirMajRouge($str);