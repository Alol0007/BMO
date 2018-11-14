<?php
$title = "Artiklar | htmlphp";

$db = connectToDatabase($dsn);
$stmt = $db->prepare("SELECT * FROM Article");
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($res);
//$article = $_GET["article"] ?? null;
// $res = getOneArticle($db, $article);
$rows = printArticleResultsetToHTMLTable3($res);
?>

        <h1>Artiklar</h1>
        <table>
    <tr>
        <th>Titel</th>
        <th>Författare</th>
        <th>Publiseringsdatum</th>

    </tr>
        <?=$rows?>
        </table>
