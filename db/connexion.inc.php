<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=mydb','root','');
    } catch (Exception $e) {
        die ("Echec de la connexion : " . $e->getMessage());
    }
?>