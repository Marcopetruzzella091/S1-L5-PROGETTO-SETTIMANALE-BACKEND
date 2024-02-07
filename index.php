<?php

    require_once 'config.php';
    
    include_once('Header.php');
    include_once('function.php'); 
    
   $params = ReadAllParams($mysqli);
   
   ?>
    

<div class="container mt-5 mb-5">
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
                    <div class="mt-1 mb-1 spec-1"><span>Autore:</span><span class="dot"> <?= $params['autore'] ?></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Anno:</span><span class="dot"> <?= $params['anno'] ?></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Genere:</span><span class="dot"> <?= $params['genere'] ?></span></div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1"> € <?= $params['prezzo_offerta'] ?></h4><span class="strike-text mx-3"> € <?= $params['prezzo'] ?></span>
                    </div>
                    <h6 class="text-success"><?= $params['spedizione'] ?></h6>
                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Dettagli</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Elimina</button></div>
                </div>
            </div>
            <?php } }?>
            
         
         
         
        </div>
    </div>
</div>





<?php include_once('footer.php');?> 



</html>