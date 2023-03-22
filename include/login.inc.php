<?php
    define("DBHOST","localhost");
    define("DBBASE","FILMS");
    define("DBUSER","root");
    define("DBPASS","root");
    define("DBPORT","8889");
    $dsn = "mysql:host=".DBHOST.";port=".DBPORT.";dbname=".DBBASE;
    $opt =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        //PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC,
    ];
    try {
        $bdd = new PDO($dsn, DBUSER, DBPASS, $opt);
    }
    catch(PDOException $e) {
        echo "Le code erreur est : ".$e->getMessage();
    }
?>