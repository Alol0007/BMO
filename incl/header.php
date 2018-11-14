<!DOCTYPE html>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <header class="site-header">
        <img src= "img/maggy/likvagn_med_hast.jpg"  width="50%" alt="bild1"/>
        <span class="site-title">Begravningsmuseum Online</span>
        <span class="site-slogan">BMO</span>
    </header>

    <nav class="navbar">
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "me.php" ? "selected" : ""; ?>" href="home.php">Hem</a>
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "about.php" ? "selected" : ""; ?>" href="about.php">Om</a>
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "multipage.php" ? "selected" : ""; ?>" href="objects.php">Objekt</a>
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "articles.php" ? "selected" : ""; ?>" href="articles.php">Artiklar</a>
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "images.php" ? "selected" : ""; ?>" href="images.php">Bilder</a>
        <a class="<?= basename($_SERVER['REQUEST_URI']) == "login.php" ? "selected" : ""; ?>" href="login.php">Administratör</a>
    </nav>
