<?php if (!($_SESSION["user"] ?? null)) : ?>
    <p>Du måste logga in för att se detta innehåll</p>
    <?php return; ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Create</title>
    </head>
    <body>
        <p>Create</p>
        <div class="content">
            <form action="login.php?page=process" method="POST">
                <label for="category">Kategori: </label>
                <input type="text" name="category" id="category">
                <label for="title">Titel: </label>
                <input type="text" name="title" id="title">
                <label for="content">Innehåll: </label>
                <input type="text" name="content" style="width:700px;height:60px" id="content">
                <label for="author">Författare </label>
                <input type="text" name="author" id="author">
                <label for="pubdate">Publiceringsdatum: </label>
                <input type="text" name="pubdate" id="pubdate">
                <input type="submit" value="Create" name="action">
            </form>

        </div>

    </body>
</html>
