<?php

if (isset($_POST['save'])){
    $strID = $_POST['arbeit_id'];

    if (Utils::Update($strID))
    {
        try {
            $deletearbeit = 'delete from arbeit  where arbeit_id= ?';
            $deleteperson= 'delete from person where arbeit_id= ?';
            $arrayV = array($strID);
            //Fkey for Pkey löschen
            Utils::makeStatement($deleteperson, $arrayV);
            Utils::makeStatement($deletearbeit, $arrayV);
            echo '<h3>Der Beruf mit Id: '.$strID.' wurde gelöscht.</h3>';
    
            $query  = 'select * from arbeit order by beruf';
            Utils::makeTable($query);
            
        }catch (Exception $e){
            echo 'Error - Straße einfügen - '.$e->getCode().': '.$e->getMessage().'<br>';
        }

    }

}else{
    echo '<h2>Neuen Straßennamen eingeben</h2>';
    ?>
    <form method="post">
        <label for="strid">ID der zu änderungs des Berufs</label>
        <input type="number" ID="strid" name="arbeit_id" required placeholder="z.B. 1">
        <br>
        <input type="submit" name="save" value="ändern">
    </form>
    <?php
}
