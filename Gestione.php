<?php 
require_once 'config.php';
require_once 'function.php';

// CREO UN SISTEMA PER IMPORTARE L'IMMAGINE, CAPIRE L'ESTENSIONE , SPOSTARLA NELLA CARTELLA UPLOAD E RINOMINARLA CONCATENANDO L'ESTENSIONE GIUSTA //
// SE NON CARICO NESSUNA IMMAGINE DI LIBRO, VERRA UTILIZZATA UN PLACEHOLDER

$contacts = [];
$target_dir = "uploads/";
$image = $target_dir.'book.png';

 $tipoMIME = $_FILES['immagine']["type"];
$parti = explode('/', $tipoMIME);
$estensione = "." .  end($parti); 






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
    echo" sto Inserendo i dati";
   
    $Titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
    $Autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
    $Anno = strlen(trim(htmlspecialchars($_REQUEST['anno'])))  ? trim(htmlspecialchars($_REQUEST['anno'])) :  exit();
    $Genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();
    $Prezzo =  strlen(trim(htmlspecialchars($_REQUEST['prezzo']))) ? trim(htmlspecialchars($_REQUEST['prezzo'])) : exit() ; ;
    $Prezzo_offerta = strlen(trim(htmlspecialchars($_REQUEST['prezzo_offerta']))) ? trim(htmlspecialchars($_REQUEST['prezzo_offerta'])) : exit() ;
    $Spedizione = strlen(trim(htmlspecialchars($_REQUEST['spedizione'])))  ? trim(htmlspecialchars($_REQUEST['spedizione'])) : exit();
    $Numero_recensioni = strlen(trim(htmlspecialchars($_REQUEST['numero_recensioni']))) ? trim(htmlspecialchars($_REQUEST['numero_recensioni'])) : exit() ; ;
    $Stelle = strlen(trim(htmlspecialchars($_REQUEST['stelle']))) ? trim(htmlspecialchars($_REQUEST['stelle'])) : exit() ;
    $descrizione = strlen(trim(htmlspecialchars($_REQUEST['descrizione']))) > 2 ? trim(htmlspecialchars($_REQUEST['descrizione'])) : exit();
    createbook($mysqli, $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image, $descrizione);
    exit(header('Location: index.php?action=lib-inser'));
     } 
    
     else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'modifica'){
        $Titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $Autore = strlen(trim(htmlspecialchars($_REQUEST['autore']))) > 2 ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
        $Anno = strlen(trim(htmlspecialchars($_REQUEST['anno']))) ==  4 ? trim(htmlspecialchars($_REQUEST['anno'])) :  exit();
        $Genere = strlen(trim(htmlspecialchars($_REQUEST['genere']))) > 2 ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();
        $Prezzo =  strlen(trim(htmlspecialchars($_REQUEST['prezzo']))) ? trim(htmlspecialchars($_REQUEST['prezzo'])) : exit() ; ;
        $Prezzo_offerta = strlen(trim(htmlspecialchars($_REQUEST['prezzo_offerta']))) ? trim(htmlspecialchars($_REQUEST['prezzo_offerta'])) : exit() ;
        $Spedizione = strlen(trim(htmlspecialchars($_REQUEST['spedizione'])))  ? trim(htmlspecialchars($_REQUEST['spedizione'])) : exit();
        $Numero_recensioni = strlen(trim(htmlspecialchars($_REQUEST['numero_recensioni']))) ? trim(htmlspecialchars($_REQUEST['numero_recensioni'])) : exit() ; ;
        $Stelle = strlen(trim(htmlspecialchars($_REQUEST['stelle']))) ? trim(htmlspecialchars($_REQUEST['stelle'])) : exit() ;
        $descrizione = strlen(trim(htmlspecialchars($_REQUEST['descrizione']))) > 2 ? trim(htmlspecialchars($_REQUEST['descrizione'])) : exit();
        
        updateBooks($mysqli, $_REQUEST['id'], $Titolo, $Autore, $Anno, $Genere, $Prezzo, $Prezzo_offerta, $Spedizione, $Numero_recensioni,$Stelle,$image, $descrizione);
        exit(header('Location: index.php?action=bookmod'));  }
        
        else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'elimina') {
            session_start();

            if(!isset($_SESSION['userLogin'])){
             
             exit(header('Location: index.php?action=unregistred'))
               
            ;}
              
           
           
            session_write_close(); 
            function removeUser($mysqli, $id) {
                if(!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) { echo($mysqli->connect_error); }
                else { echo 'Record eliminato con successo!!!';}
            }
            removeUser($mysqli, $_REQUEST['id']);
            exit(header('Location: index.php?action=bookdel'));}
     
         else if (isset($_REQUEST['action'])&& $_REQUEST['action'] === 'registrazione') {
        

        $username = strlen(trim(htmlspecialchars($_REQUEST['titolo']))) > 2 ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $password = strlen(trim(htmlspecialchars($_REQUEST['password']))) > 2 ? trim(htmlspecialchars($_REQUEST['password'])) : exit();
        $passwordcript = password_hash($password , PASSWORD_DEFAULT);

        echo "fin qui tutto bene ";
        creaUsers($mysqli, $username, $passwordcript, $image);
        exit(header('Location: index.php?action=reg-approved'));




    } 
    
     else{echo "errore";}

    


     if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'login') {
        echo 'Sono nella sezione login';
         login ($mysqli, $_REQUEST['username'], $_REQUEST['password']); 
        /* exit(header('Location: index.php')) */;
    } else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
        echo 'Sono nella sezione logout';
        session_start();
        session_unset();
         exit(header('Location: index.php?action=logged')) ;
    }
   

   
?>
