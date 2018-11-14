<?php

$title = "Artiklar | htmlphp";

$db = connectToDatabase($dsn);
// print_r($dsn);

$article = $_GET["article"] ?? null;
$res = getOneArticle($db, $article);
//print_r($res);
try {
    $stmt = $db->prepare("SELECT title, content, author, pubdate FROM Article WHERE id = $article");
} catch (PDOException $e) {
    header("Location: articles.php?page=index");

}
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$rows = printArticleResultsetToHTMLTable2($res);

?><!DOCTYPE html>

        <h1><a href="javascript:javascript:history.go(-1)">Tryck här för att gå tillbaka ett steg</a><h1>
            <article>
            <table>
        <tr>
            <th>Titel</th>
            <th>Innehåll</th>
            <th>Författare</th>
            <th>Publiseringsdatum</th>

        </tr>
            <?=$rows?>
            </table>
        </article>
