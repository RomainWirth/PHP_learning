<?php
    // configuration
    $host = 'localhost';
    $db = 'fuel-dataviz';
    $user = 'postgres';
    $pwd = 'password';

    // connection BDD
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    try {
        // make a database connection
        $pdo = new PDO(
            $dsn,
            $user,
            $pwd,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        if ($pdo) {
            echo "Connection à la base de données : $db établie";
        }
    } catch (PDOException $error) {
        die('Erreur : '.$error -> getMessage());
    }

?>