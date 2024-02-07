<?php 
 include_once('Header.php'); 
 include_once('config.php'); 
    
?>
<!-- NEL FORM FACCIO UN PRIMO CONTROLLO SUI DATI ASSICURANDOMI DI GUIDARE L'UTENTE NELL'INSERIMENTO CORRETTO
QUINDI NON SARA' POSSIBILI INSERIRE UN ANNO OLTRE IL 2024, UN PREZZO NON DECIMALE, UNA VALUTAZIONE NON OLTRE LE 5 STELLE E UNA SPEDIZIONE RANDOM -->
<div class="container">
  <h2 class="text-center">Modulo di inserimento per Libri</h2>
  <form method="post" action="Gestione.php?action=inserisci" enctype="multipart/form-data" class="my-3">
    <div class="form-group">
      <label for="titolo">Titolo:</label>
      <input type="text" class="form-control my-1" id="titolo" name="titolo" placeholder="Inserisci il titolo" >
    </div>
    <div class="form-group">
      <label for="autore">Autore:</label>
      <input type="text" class="form-control my-1" id="autore" name="autore" placeholder="Inserisci l'autore" >
    </div>
    <div class="form-group">
      <label for="anno">Anno:</label>
      <input type="number" class="form-control my-1" id="anno" name="anno" placeholder="Inserisci l'anno di pubblicazione"  max="2024" >
    </div>
    <div class="form-group">
      <label for="genere">Genere:</label>
      <input type="text" class="form-control my-1" id="genere" name="genere" placeholder="Inserisci il genere" >
    </div>
    <div class="form-group">
      <label for="prezzo">Prezzo <span class="text-danger">(inserire numero intero oppure  decimale col punto es: 21.22)</span></label>
      <input type="text" class="form-control my-1" id="prezzo" name="prezzo" placeholder="Inserisci il prezzo "  pattern="\d+(\.\d{1,2})?">
    </div>
    <div class="form-group">
      <label for="prezzo_offerta">Prezzo in Offerta <span class="text-danger">(inserire numero intero oppure decimale col punto es: 21.22)</span></label>
      <input type="text" class="form-control my-1" id="prezzo_offerta" name="prezzo_offerta" placeholder="Inserisci il prezzo in offerta" pattern="\d+(\.\d{1,2})?">
    </div>
    <div class="form-group">
    <div class="form-group">
  <label for="genere">Spedizione:</label>
  <select class="form-control" id="genere" name="spedizione" required name="spedizione">
    
    <option value="Spedizione Gratuita">Spedizione Gratuita</option>
    <option value="Spedizione a 4,99 Eur">Spedizione a 4,99 Eur </option>
  </select>
</div>

    <div class="form-group">
      <label for="numero_recensioni">Numero Recensioni:</label>
      <input type="number" class="form-control my-1" id="numero_recensioni" name="numero_recensioni" placeholder="Inserisci il numero di recensioni" >
    </div>
    <div class="form-group">
      <label for="stelle">Stelle:</label>
      <input type="number" min="1" max="5" class="form-control my-1" id="anno" name="stelle" placeholder="Inserisci l'anno di pubblicazione"  >
    </div>
    <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" placeholder="Image..." name="immagine">
            </div>
    <button type="submit" class="btn btn-primary my-3">Invia</button>
  </form>
</div>
</div>
<?php include_once('footer.php'); ?>