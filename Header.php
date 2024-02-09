
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/style.css">





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head><body>


<nav class="navbar bg-body-tertiary" >
  <div class="container-fluid"> <div><a class="navbar-brand" href="index.php">
      <img src="assets/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Epibooks 
    </a> <a class="navbar-brand" href="inserisci.php">
      
      Inserisci Nuovo
    </a></div>
   <?php
   if(isset($_SESSION['userLogin'])){
    
     echo "<div><a class='navbar-brand' href='#'>
      
    benvenuto ". $_SESSION['userLogin']['nome_utente'].  "
  </a><a class='navbar-brand' href='Gestione.php?action=logout
'>
    
    Logout
  </a> </div>
</div>" ;
     
     
     ;
   }
   
   else{ echo " <div><a class='navbar-brand' href='login.php'>
      
    Login 
  </a><a class='navbar-brand' href='registrazione.php
'>
    
    Register 
  </a> </div>
</div>" ;}
   
   ?>
   
</nav>
