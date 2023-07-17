<?php
if(isset($_POST['save'])){
        $firma = $_POST['firma'];
        $beruf = $_POST['beruf'];
        Utils::beruffirma($firma, $beruf);
}
else {
    echo '<h1>Bewerbung</h1>
<form method="post">
  <div class="mb-3">
    <label for="floatingInput" class="form-label">Vorname</label>
    <input type="text" class="form-control">
    <label for="floatingInput" class="form-label">Nachname</label>
    <input type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label for="floatingInput" class="form-label">Firma</label>
    <select class="form-select" name="firma" aria-label="Default select example">
        <option value="facc">FACC</option>
        <option value="tgw">TGW</option>$
        <option value="stiwa">STIWA</option>
    </select>
  </div>
  <label for="floatingInput" class="form-label">Stelle</label>
  <div id="ausbildung" class="mb-3">
  <div class="form-check">
  <input class="form-check-input" type="radio" value="coder" name="beruf" id="ausbildung_ahs">
  <label class="form-check-label" for="flexRadioDefault1">
  Coder
  </label>
    </div>
    
    <div class="form-check">
  <input class="form-check-input" type="radio" value="burgimaker" name="beruf" id="ausbildung_htl">
  <label class="form-check-label" for="flexRadioDefault2">
Burgimaker
  </label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" value="prozesstechniker" name="beruf" id="ausbildung_htl">
<label class="form-check-label" for="flexRadioDefault2">
Prozesstechniker
</label>
</div>
<br>
<input class="btn btn-danger" type="submit" name="save" value="prüfen">';
}
?>