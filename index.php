<?php

    require_once 'config.php';
    
    
    include_once('function.php'); 
    
   $params = ReadAllParams($mysqli);
   
   session_start();

  
   


   session_write_close(); 
   include_once('Header.php');
   ?>
    

<div class="container mt-5 mb-5">
    
    <div class="row">
    <?php 
if(isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'reg-approved') ){ echo ' 
    <div class="alert alert-success" role="alert">
    Utente registrato con successo!
</div> ' ;}
    else if (isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'bookmod') ){ echo ' 
        <div class="alert alert-warning" role="alert">
    Libro modificato con successo!</div> ' ;}
        else if (isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'bookdel') ){ echo ' 
            <div class="alert alert-success" role="alert">
            Libro eliminato con successo!</div>' ;}
            else if (isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'lib-inser') ){ echo ' 
                <div class="alert alert-success"" role="alert">
    Libro inserito con successo!</div>' ;}
                else if (isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'logged') ){ echo ' 
                    <div class="alert alert-success" role="alert">
    Logout effettuato!</div>' ;}
                    else if (isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'unregistred') ){ echo ' 
                        <div class="alert alert-warning" role="alert">
                        Solo gli utenti loggati possono effettuare operazioni di inserimento / modifica / eliminazione</div>' ;}?>
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <?php 
                    if($params){
                    foreach ($params as $key => $params) { 
                    ?>
            <div class="row p-2 bg-white border rounded riga">
                <div class="col-md-2 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?=$params['immagine']?>"></div>
                <div class="col-md-6 mt-1">
                    <h5><?= $params['titolo']?></h5>
                    
                    <div class="d-flex flex-row align-items-baseline">
                    

                       <?php for ($i = 1; $i <= 5; $i++) {
          
                 if ($i <= $params['stelle']) {
                     echo "<i class='fa fa-star'></i> "; 
                  } else {
                      echo "<i class='fa-regular fa-star'></i> "; 
                       }
                              }?><span class="mx-1"><?= $params['numero_recensioni'] ?></span>

                        
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span class="fw-bold">Autore:</span><span class="dot"> <?= $params['autore'] ?></span></div>
                    <div class="mt-1 mb-1 spec-1"><span class="fw-bold">Anno:</span><span class="dot"> <?= $params['anno'] ?></span></div>
                    <div class="mt-1 mb-1 spec-1"><span class="fw-bold">Genere:</span><span class="dot"> <?= $params['genere'] ?></span></div>
                    <p class="text-justify  para mb-0"><?= $params['descrizione'] ?><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1 text-danger-emphasis"> € <?= $params['prezzo_offerta'] ?></h4><span class="strike-text mx-3 text-decoration-line-through"> € <?= $params['prezzo'] ?></span>
                    </div>
                    <h6 class="text-success"><?= $params['spedizione'] ?></h6>

                    <div class="d-flex flex-column mt-4"><a  href="modifica.php?id=<?= $params['ID'] ?>"><button class="btn btn-primary btn-sm w-100" type="button">Modifica</button></a><a    href="Gestione.php?id=<?= $params['ID'] ?>&action=elimina"><button class=" w-100 btn btn-outline-primary btn-sm mt-2" type="button">Elimina</button></a></div>
                </div>
            </div>
            <?php } }?>
            
         
         
         
        </div>
    </div>
</div>

</div>




<?php 

                 
             
            
    



include_once('footer.php');?> 



</html>