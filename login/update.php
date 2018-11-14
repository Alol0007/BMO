<?php if (!($_SESSION["user"] ?? null)) : ?>
    <p>You need to login to see protected information.</p>
    <?php return; ?>
<?php endif; ?>
<?php
$db = connectToDatabase($dsn);
$article = $_GET["article"] ?? null;
$res = getOneArticle($db, $article);
    ?>
<!DOCTYPE html>
<html lang="sv" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Update</title>
    </head>
    <body>
        <p>Update</p>
        <div class="content">
            <form action="login.php?page=process" method="POST">
                <label for="id">Id: </label>
                <input type="text" name="id" id="id" value="<?=$res["id"]?>" readonly>
                <label for="category">Kategori: </label>
                <input type="text" name="category" id="category" value="<?=$res["category"]?>">
                <label for="title">Titel: </label>
                <input type="text" name="title" id="title" value="<?=$res["title"]?>">
                <label for="content">Innehåll: </label>
                <input type="text" name="content" style="width:700px;height:60px" id="content" value="<?=$res["content"]?>">
                <label for="author">Författare </label>
                <input type="text" name="author" id="author" value="<?=$res["author"]?>">
                <label for="pubdate">Publiceringsdatum: </label>
                <input type="text" name="pubdate" id="pubdate" value="<?=$res["pubdate"]?>">
                <input type="submit" value="Update" name="action">
            </form>

        </div>

    </body>
</html>
