<?php

if(isset($_POST['save']))
{
    echo'<h1>'.$_POST['schema'].'</h1>';
?>
<form method="post">
<?php
$db = new Database();
$stmt = $db->pdo->prepare
('Select * from '.$_POST['schema']);
$stmt->execute();
$colCount = $stmt->columnCount();
        for ($i = 0; $i < $colCount; $i++){
            $meta[] = $stmt->getColumnMeta($i);
            echo '<label for='.$meta[$i]['name'].' >'.$meta[$i]['name'].'</label>';
            echo '<input type="text" id='.$meta[$i]['name'].' class="form-control">';
            
        }
?>
<button type="submit" name="reset"class="btn btn-primary" value="speichern">Submit</button>

</form>
<?php

}else {
    echo'
<form method="post">
  <div class="mb-3">
    <label for="schema" class="form-label"> Wähle eine Tabelle</label>
    <select name="schema" id="schema">';

    $db = new Database();
    $stmt = $db->pdo->prepare
    ("show databases");
    $stmt->execute();
  
    while($schema=$stmt->fetch(PDO::FETCH_NUM))
    {
        $tables = $db->pdo->prepare
        ("show tables from ".$schema[0]);
        $tables->execute();

        while($table=$tables->fetch(PDO::FETCH_NUM))
        {
            echo '<option>'.$schema[0].'.'.$table[0].'</option>';
            
        }
    }
echo '</select>';
?>
<button type="submit" class="btn btn-primary" name="save" value="speichern">Submit</button>
</form>
<?php
}
?>