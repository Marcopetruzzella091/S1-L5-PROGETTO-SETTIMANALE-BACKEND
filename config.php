<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);
if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

$nomedb = 'gestione_libreria';




$sql = "CREATE DATABASE IF NOT EXISTS $nomedb";
if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}

$mysqli->query('USE '. $nomedb); // Seleziono il DB



// Creo la tabella
$sql = 'CREATE TABLE IF NOT EXISTS libri (
    `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titolo` VARCHAR(255) NOT NULL,
    `autore` VARCHAR(255) NOT NULL,
    `anno` INT NOT NULL,
    `genere` VARCHAR(100) NOT NULL,
    `prezzo` DECIMAL(10, 2) NOT NULL,
    `prezzo_offerta` DECIMAL(10, 2) NOT NULL,
    `spedizione` VARCHAR(100) NOT NULL,
    `numero_recensioni` INT NOT NULL,
    `stelle` INT NOT NULL,
    `immagine` VARCHAR(255) NULL, 
    `descrizione` VARCHAR(255) NULL
)';

if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}


$sql = 'CREATE TABLE IF NOT EXISTS utenti ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_utente VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    user_image VARCHAR(255) NOT NULL
    
)';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

?>