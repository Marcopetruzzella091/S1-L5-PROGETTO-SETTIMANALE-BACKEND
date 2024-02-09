<?php 
    include_once('Header.php'); 
    require_once 'config.php';
    require_once 'function.php';




     session_start();

     if(!isset($_SESSION['userLogin'])){
      
      exit(header('Location: index.php?action=unregistred'))
        
     ;}



    if(isset($_GET['id']) ) {
        
        $books = getUserByID($mysqli);
       
        
    }

  


    
    

    
    ?>

<div class="container">
  <h2 class="text-center">Modulo di inserimento per Libri</h2>
  <div class="row">
    <div class="col-md-8">
  <form method="post" action="Gestione.php?action=modifica&id=<?= $_GET['id'] ?>" enctype="multipart/form-data" class="my-3">
    <div class="form-group">
      <label for="titolo">Titolo:</label>
      <input type="text" class="form-control my-1" id="titolo" name="titolo"  value="<?= $books['titolo'] ?> ">
    </div>
    <div class="form-group">
      <label for="autore">Autore:</label>
      <input type="text" class="form-control my-1" id="autore" name="autore" placeholder="Inserisci l'autore"  value="<?= $books['autore'] ?> ">
    </div>
    <div class="form-group">
      <label for="anno">Anno:</label>
      <input type="number" class="form-control my-1" id="anno" name="anno" placeholder="Inserisci l'anno di pubblicazione"  max="2024" value=<?= $books['anno']?>>
    </div>
    <div class="form-group">
      <label for="genere">Genere:</label>
      <input type="text" class="form-control my-1" id="genere" name="genere" placeholder="Inserisci il genere" value="<?= $books['genere'] ?> " >
    </div>
    <div class="form-group">
      <label for="prezzo">Prezzo <span class="text-danger">(inserire numero intero oppure  decimale col punto es: 21.22)</span></label>
      <input type="text" class="form-control my-1" id="prezzo" name="prezzo" placeholder="Inserisci il prezzo "  pattern="\d+(\.\d{1,2})?" value="<?= $books['prezzo'] ?>">
    </div>
    <div class="form-group">
      <label for="prezzo_offerta">Prezzo in Offerta <span class="text-danger">(inserire numero intero oppure decimale col punto es: 21.22)</span></label>
      <input type="text" class="form-control my-1" id="prezzo_offerta" name="prezzo_offerta" placeholder="Inserisci il prezzo in offerta" pattern="\d+(\.\d{1,2})?" value="<?= $books['prezzo_offerta'] ?>">
    </div>
    <div class="form-group">
    <div class="form-group">
  <label for="genere">Spedizione:</label>
  <select class="form-control" id="genere" name="spedizione" required name="spedizione" value="<?= $books['spedizione'] ?> ">
    
    <option value="Spedizione Gratuita">Spedizione Gratuita</option>
    <option value="Spedizione a 4,99 Eur">Spedizione a 4,99 Eur </option>
  </select>
</div>

    <div class="form-group">
      <label for="numero_recensioni">Numero Recensioni:</label>
      <input type="number" class="form-control my-1" id="numero_recensioni" name="numero_recensioni" placeholder="Inserisci il numero di recensioni"  value=<?= $books['numero_recensioni'] ?> >
    </div>
    <div class="form-group">
      <label for="stelle">Stelle:</label>
      <input type="number" min="1" max="5" class="form-control my-1" id="anno" name="stelle" placeholder="Inserisci l'anno di pubblicazione"  value=<?= $books['stelle'] ?>  >
    </div>
    <div class="form-group">
      <label for="titolo">descrizione:</label>
      <input type="text" class="form-control my-1" id="titolo" name="descrizione" placeholder="Inserisci la descrizione"  value='<?= $books['descrizione'] ?>'>
    </div>
    <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" placeholder="Image..." name="immagine" value=<?= $books['immagine'] ?>>
            </div>
    <button type="submit" class="btn btn-primary my-3">Invia</button>
  </form>
  </div>
  </div>
  <div class="col-md-3 m-4">
    <h3>Stai Modificando </h2>
  <div class="card" style="width: 18rem;">
  <img src="<?= $books['immagine'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $books['titolo'] ?></h5>
    <p class="card-text">Assicurati di completare tutti i campi nel formato giusto.</p>
    
  </div>
</div>




  </div>




</div>








<?php include_once('footer.php');?> 



</html>