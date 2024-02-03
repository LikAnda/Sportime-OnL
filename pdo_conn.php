<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=sportime_onl;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}