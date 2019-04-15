<?php
    include_once 'config.php';
    $connectDB->query("
        UPDATE users 
        SET access = access + 1 
        WHERE email = '".$_COOKIE['email']."'
    ");

    $result = $connectDB->query("
    SELECT *
    FROM users
    WHERE email = '" . $_COOKIE['email'] . "'");
    $row = mysqli_fetch_array($result);
    echo("Hai eseguito l'accesso " . $row['access'] . " volte");
?>