<?php
$title = "Objects | htmlphp";
$db = connectToDatabase($dsn);
$stmt = $db->prepare("SELECT id, title, category, text, image FROM Object");
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($res);
$rows = printObjectResultsetToHTMLTable3($res);
?>
        <h1>Alla Objekt listade med kategori och text, samtliga objekt tillhör Ronny Holm.</h1>
        <h4>Observera att du kan trycka "Läs" på vänster sida av varje objekt</h4>

            <table>
                <th></th>
                <th></th>
                <th>Titel</th>
                <th>Kategori</th>
                <th>Text</th>
                <th>Bild</th>

            <?=$rows?>
            </table>
