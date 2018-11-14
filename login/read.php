<?php if (!($_SESSION["user"] ?? null)) : ?>
    <p>You need to login to see protected information.</p>
    <?php return; ?>
<?php endif; ?>

<h1>Protected page</h1>

<p>The user <b><?= $_SESSION["user"] ?></b> is currently logged in.</p>


<?php
$db = connectToDatabase($dsn);

//prepare and execute the SQL statement
$stmt = $db->prepare("SELECT * FROM Article");
$stmt->execute();
// get the reults as an array with columns names as arary keys
$res = $stmt->fetchAll();
$rows = printArticleResultsetToHTMLTable6($res);

echo <<<EOD
<table>
<tr>

    <th>id</th>
    <th>category</th>
    <th>title</th>
    <th>content</th>
    <th>author</th>
    <th>pubdate</th>
</tr>
$rows
</table>
EOD;
