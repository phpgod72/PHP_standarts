<?php
include("dbconf.php");
class Utils
{

    public static function getwortteil($searchword)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare
        ("SELECT beruf from arbeit where beruf like ?");
        $stmt->execute(["%" . $searchword . "%"]);
        $res = $stmt->fetchAll();

        if (!$res) {
            return false;
        }
        return $res;
    }

    public static function makeStatement($query, $arrayValues = null){
        $db = new Database();
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($arrayValues);
        return $stmt;
    }
    

    public static function Update($strID)
{
    $db = new Database();
    $stmt = $db->pdo->prepare("select * from arbeit where arbeit_id= ?;");
    $stmt->execute([$strID]);

    if ($stmt->fetch())
    {
        return true;
    }
    else
    {
        echo '<h3>Der Beruf mit dieser ID = '.$strID.' existiert nicht!</h3>';
        return false;
    }
}

public static function beruffirma($firma, $beruf)
{
    $db = new Database();
    $stmt = $db->pdo->prepare("select * from arbeit where firma = ? and beruf = ? ");
    $stmt->execute([$firma, $beruf]);

    if ($stmt->fetch())
    {
        echo 'wurde versendet';
        return true;
    }
    else
    {
        echo '<h3>Die Firma '. $firma. ' hat diesen Beruf: '.$beruf.'  nicht!</h3>';
        return false;
    }
}




public static function Inserts($insi)
{   
    $db = new Database();
    $stmt = $db->pdo->prepare("select * from arbeit where beruf = ?;");
    $stmt->execute([$insi]);

    if ($stmt->fetch())
    {
        echo '<h3>Der Ort '.$insi.' existiert bereits!</h3>';
        return true;
    }
    else
    {
        return false;
    }
}

    public static function makeTable($query)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare($query);
        $stmt->execute();
        $meta = array();
        echo '<table class="table">
              <tr>';
    
        for ($i = 0; $i < $stmt->columnCount(); $i++){
            $meta[] =$stmt->getColumnMeta($i);
            echo '<td>'.$meta[$i]['name'].'</td>';
        }
    
        echo '</tr>';

        while($row = $stmt->fetch(PDO::FETCH_NUM)){
            echo '<tr>';
            foreach ($row as $r){
                echo '<td>'.$r.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    

    public static function Result($showresult)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare(
            "SELECT beruf, firma, person_vn, person_nn 
            from arbeit join person 
            on arbeit.Arbeit_id = person.arbeit_id
            where beruf = ?");

    $stmt->execute([$showresult]);
    $res = $stmt->fetchAll();
    
    if ($res) {
        ?>
<table class="table table-striped">
                    <tr>
                        <br>
                        <th scope="col">Beruf</th>
                        <th scope="col">Firmenname</th>
                        <th scope="col">Person</th>
                    </tr>

<?php 
foreach($res as $searchlist)
{
             echo "<tr style='background-color:pink'>";
             echo "<td>" . $searchlist["beruf"]. "</td>";
             echo "<td>" . $searchlist["firma"]. "</td>";
             echo "<td>" . $searchlist["person_vn"]." ". $searchlist["person_nn"]."</td>";
             echo "</tr>";
} ?>
</table>

<?php

 }
else
{
    echo "Keine Daten gefunden";
}
    
}
}