<?php

if (isset($_POST['save'])){
    $strasse = $_POST['beruf'];
    $strID = $_POST['arbeit_id'];

    if (Utils::Update($strID))
    {
        try {
            $insertQuery = 'update arbeit set beruf = ? where arbeit_id= ?';
            $arrayV = array($strasse, $strID);
            Utils::makeStatement($insertQuery, $arrayV);
    
            echo '<h3>Die Strasse '.$strasse.' mit Id: '.$strID.' wurde angepasst.</h3>';
    
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
        <label for="str">neuer Name</label>
        <input type="text" ID="str" name="beruf" required placeholder="z.B. Wiener Straße">
        <br>
        <input type="submit" name="save" value="ändern">
    </form>
    <?php
}
