<h2>Alle ausgeben</h2>

<?php
$query = 'select beruf as "Beruf",
firma as "Firma",
person_vn as "Vorname",
person_nn as "Nachname"
from arbeit
join person on Arbeit.arbeit_id = person.arbeit_id
order by firma';
Utils::makeTable($query);
?>

