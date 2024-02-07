<?php 
require_once 'config.php';
require_once 'function.php';

// CREO UN SISTEMA PER IMPORTARE L'IMMAGINE, CAPIRE L'ESTENSIONE , SPOSTARLA NELLA CARTELLA UPLOAD E RINOMINARLA CONCATENANDO L'ESTENSIONE GIUSTA //

$contacts = [];
$target_dir = "uploads/";
$image = $target_dir.'avatar.png';

$tipoMIME = $_FILES['immagine']["type"];
$parti = explode('/', $tipoMIME);
$estensione = "." .  end($parti); 

echo $estensione;



 if(!empty($_FILES['immagine'])) {
    if($_FILES['immagine']["type"] === 'image/png' || $_FILES['immagine']["type"] === 'image/jpeg') {
        if($_FILES['immagine']["size"] < 4000000) {
            if(is_uploaded_file($_FILES['immagine']["tmp_name"]) && $_FILES['immagine']["error"] === UPLOAD_ERR_OK) {
                if(move_uploaded_file($_FILES['immagine']["tmp_name"], $target_dir.$_REQUEST['titolo'].$estensione)) {
                    $image = $target_dir.$_REQUEST['titolo'].$estensione;
                    echo 'Caricamento avvenuto con successo';
                } else {
                    echo 'Errore!!!';
                }
            }
        } else {
            echo 'FileSize troppo grande';
        }
    } else {
        echo 'FileType non supportato';
    }
}





// nelle stringe mi assicuro che gli siano almeno composte da 2 caratteri, nell'anno mi assicuro che sia composto da 4 cifre
//
if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'inserisci') {
    echo" sto leggendo  i dati";
    //spostare il corpo della funzione

 



   
    $Titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
    $Autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
    $Anno = strlen(trim(htmlspecialchars($_REQUEST['anno']))) ==  4 ? trim(htmlspecialchars($_REQUEST['anno'])) :  exit();
    $Genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();
    $Prezzo =  strlen(trim(htmlspecialchars($_REQUEST['prezzo']))) ? trim(htmlspecialchars($_REQUEST['prezzo'])) : exit() ; ;
    $Prezzo_offerta = strlen(trim(htmlspecialchars($_REQUEST['prezzo_offerta']))) ? trim(htmlspecialchars($_REQUEST['prezzo_offerta'])) : exit() ;
    $Spedizione = strlen(trim(htmlspecialchars($_REQUEST['spedizione'])))  ? trim(htmlspecialchars($_REQUEST['spedizione'])) : exit();
    $Numero_recensioni = strlen(trim(htmlspecialchars($_REQUEST['numero_recensioni']))) ? trim(htmlspecialchars($_REQUEST['numero_recensioni'])) : exit() ; ;
    $Stelle = strlen(trim(htmlspecialchars($_REQUEST['stelle']))) ? trim(htmlspecialchars($_REQUEST['stelle'])) : exit() ;
    createbook($mysqli, $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image);


    
  
   } else{echo "errore";}

    


  
   echo" ho letto";

   
?>
