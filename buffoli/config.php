<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "login";

    $connectDB = new mysqli($host, $username, $password);
    $connectDB = new mysqli($host, $username, $password, $database);
    if($connectDB->connect_error)
        die("Connessione fallita " . $connectDB->connect_error);

    $connectDB->query('CREATE TABLE IF NOT EXISTS users (email varchar(50) NOT NULL,password varchar(100) NOT NULL,birthday date NOT NULL,access int DEFAULT 0);');
?>