<?php require_once 'config.php';

function createbook($mysqli, $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image,$descrizione)
{$sql = "INSERT INTO libri (titolo, autore, anno, genere, prezzo, prezzo_offerta, spedizione, numero_recensioni,stelle,immagine,descrizione) 
  VALUES ('$Titolo', '$Autore', '$Anno', '$Genere', '$Prezzo', '$Prezzo_offerta', '$Spedizione', '$Numero_recensioni','$Stelle','$image','$descrizione');";
if (!$mysqli->query($sql)) {
echo ($mysqli->connect_error);
} else {  
echo 'Record aggiunto con successo!!!';
}};



function creaUsers($mysqli, $username, $passwordcript)
{$sql = "INSERT INTO utenti (nome_utente, password) 
  VALUES ('$username', '$passwordcript');";
if (!$mysqli->query($sql)) {
echo ($mysqli->connect_error);
} else {  
echo 'Record aggiunto con successo!!!';
}};


function ReadAllParams($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM libri;";
    $res = $mysqli->query($sql); // return un mysqli result
    if ($res) { 
        while ($row = $res->fetch_assoc()) {
            $result[] = $row; 
            
        }
    }
    return $result;
}


function getUserByID($mysqli) {     
    $sql = "SELECT * FROM libri WHERE ID = " . $_GET['id']; 
    $res = $mysqli->query($sql); 
    if($res) { 
        $result = $res->fetch_assoc();
    }
    return $result;
   
} 
function updateBooks($mysqli, $id, $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image,$descrizione) {
    $sql = "UPDATE libri SET 
                        titolo = '" . $Titolo . "', 
                        autore = '" . $Autore. "', 
                        anno = '" . $Anno. "', 
                        genere = '" . $Genere. "', 
                        prezzo = '" . $Prezzo. "', 
                        prezzo_offerta = '" . $Prezzo_offerta. "',
                        spedizione = '" . $Spedizione . "' ,
                        numero_recensioni = '" . $Numero_recensioni . "',
                        stelle = '" . $Stelle . "',
                        immagine = '" . $image . "',
                        descrizione = '" . $descrizione . "'
                        WHERE ID = ".  $id ;
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiornato con successo!!!';}     

       
}


function login($mysqli, $username, $password) {
    $sql = "SELECT * FROM utenti WHERE nome_utente = '$username'";
    $res = $mysqli->query($sql);
    //var_dump($res);
    if($res) { // Controllo se ci sono dei dati nella variabile $res 
        $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
    }
    var_dump($result['password']);
    if(password_verify($password, $result['password'])){
        echo 'Login effettuato!!';
        session_start();
        $_SESSION['userLogin'] = $result;
        session_write_close();
         exit(header('Location: index.php')); 
    } else {
        echo 'Password errata!!';
    }
}


?>