<?php
    $server = 'localhost';
    $username = 'stampy';
    $password = 'stampy_mail';
    $database = 'stampymail';

    try{
        $conn = new PDO("mysql:host =$server;dbname=$database;",$username, $password);
    } catch(PDOException $e){

        die('Connected failed: '.$e->getMessage());
    }

?>