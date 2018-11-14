<?php


$search = $_GET["search"] ?? null;
$db = connectToDatabase($dsn);
// if (!$db) {
//     echo "Something wrong with the DB connection";
// } else {
//     echo "Connection to database: OK";
// }
//
// echo $dsn;
// input search är selfsubmitting och jobbar med GET, postar sig själv på samma sida, htmlenteties används för att minnas sitt värde under olika sidomladdningar
?><!DOCTYPE html>
<form>

        <p>Skriv här  <input type="search" name="search"  style="width:700px;height:40px" placeholder="Skriv del av söksträng med %, eller med nummer, eller med text tex->begravningskonfekt" autofocus value="<?=htmlentities($search)?>"></p>
    <input type="hidden" name="page" value="form">
</form>

<?php
$sql = <<<EOD
SELECT
    *
FROM Article
WHERE
    id LIKE ? OR
    category LIKE ? OR
    title LIKE ? OR
    content LIKE ? OR
    author LIKE ? OR
    pubdate LIKE ?
;
EOD;
//prepare and execute the SQL statement
$stmt = $db->prepare($sql);
$stmt->execute([$search, $search, $search, $search, $search, $search]);
// get the reults as an array with columns names as arary keys
$res = $stmt->fetchAll();
$rows = printArticleResultsetToHTMLTable($res);

echo <<<EOD
<table>
<tr>

    <th>Id</th>
    <th>Kategori</th>
    <th>Titel</th>
    <th>Innehåll</th>
    <th>Författare</th>
    <th>Publiceringsdatum</th>


</tr>

$rows
</table>
EOD;
?>
