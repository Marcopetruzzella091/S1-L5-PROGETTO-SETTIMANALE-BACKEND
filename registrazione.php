<?php

    require_once 'config.php';
    
    include_once('Header.php');
    include_once('function.php'); 
    
  
   
   ?>
<div class="container">
<h1 class="text-center">Registrati </h1>
<form class="py-5 w-50 m-auto" action="gestione.php?action=registrazione" method="post" >
  <div class="mb-3">
    <label  class="form-label">Nome utente</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="inserisci un nome utente" name="username">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Crea la tua password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">invia</button>
</form>

</div>



   <?php include_once('footer.php');?> 

   