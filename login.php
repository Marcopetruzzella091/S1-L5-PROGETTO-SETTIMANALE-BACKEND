<?php

    require_once 'config.php';
    
    include_once('Header.php');
    include_once('function.php'); 
    
  
   
   ?>

<div class="container">
    <h1 class="text-center">Login </h1>
    <?php if(isset($_REQUEST['action'])  && ($_REQUEST['action'] == 'logerr') ){ echo ' 
    <div class="alert alert-danger" role="alert">
   Credenziali errate!!
</div> ' ;}?>
<form class="py-5 w-50 m-auto"  method="post" action="Gestione.php?action=login" >
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