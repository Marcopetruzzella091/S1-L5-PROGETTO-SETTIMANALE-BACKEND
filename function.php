<?php require_once 'config.php';

function createbook($mysqli, $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image)
{$sql = "INSERT INTO libri (titolo, autore, anno, genere, prezzo, prezzo_offerta, spedizione, numero_recensioni,stelle,immagine) 
  VALUES ('$Titolo', '$Autore', '$Anno', '$Genere', '$Prezzo', '$Prezzo_offerta', '$Spedizione', '$Numero_recensioni','$Stelle','$image');";
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
    if ($res) { // Controllo se ci sono dei dati nella variabile $res
        while ($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
            $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
            //array_push($contacts, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }
    return $result;
}


?>