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



// Creo la tabella se non esiste
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


// Creo la tabella utenti se non esiste

$sql = 'CREATE TABLE IF NOT EXISTS utenti ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_utente VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    user_image VARCHAR(255) NOT NULL
    
)';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); }


// Se il Db è vuoto , Creo qualche voce per non mostrare una pagina vuota.





$result = $mysqli->query("SELECT COUNT(*) as total FROM libri");
$data = $result->fetch_assoc();

if ($data['total'] == 0) {
    $sqlInsert = "INSERT INTO libri 
    (`titolo`, `autore`, `anno`, `genere`, `prezzo`, `prezzo_offerta`, `spedizione`, `numero_recensioni`, `stelle`, `immagine`, `descrizione`) 
VALUES 
('Harry Potter e la pietra filosofale', 'J. K. Rowling', 1997, 'Fantasy', 21.15, 13.45, 'Spedizione Gratuita', 489, 4, 'uploads/Harry Potter e la pietra filosofale .jpeg', 'Girando la busta con mano tremante, Harry vide un sigillo di ceralacca color porpora con uno stemma araldico: un leone, un&#039;aquila, un tasso e un serpente intorno a una grossa H'),
( 'Harry Potter e la camera dei segreti', 'J. K. Rowling', 1998, 'fantasy', 22.21, 10.99, 'Spedizione Gratuita', 479, 3, 'uploads/Harry Potter e la camera dei segreti .jpeg', '«C&#039;è un complotto, Harry Potter. Un complotto per far succedere le cose più terribili, quest&#039;anno, alla scuola di magia e stregoneria di Hogwarts».'),
( 'the lord of rings', 'Tolkien', 2003, 'fantasy', 22.99, 19.99, 'Spedizione Gratuita', 256, 3, 'uploads/the lord of rings .jpeg', 'Since it was first published in 1954, The Lord of the Rings has been a book people have treasured.')
   ;";

if (!$mysqli->query($sqlInsert)) {
    die($mysqli->error);
}
}




?>