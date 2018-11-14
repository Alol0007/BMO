<!doctype html>

<?php

$title = "Artiklar | htmlphp";

$db = connectToDatabase($dsn);
$stmt = $db->prepare("SELECT title, content, author, pubdate FROM Article");
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($res);
$rows = printArticleResultsetToHTMLTable2($res);


?><!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title><h1>Artiklar</h1></title>
    </head>
    <body>
        <table>
        <tr>
            <th>Titel</th>
            <th>Innehåll</th>
            <th>Författare</th>
            <th>Publiseringsdatum</th>

        </tr>
        <?=$rows?>
        </table>
    </body>
</html>
