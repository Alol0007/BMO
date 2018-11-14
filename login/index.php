<?php if (!($_SESSION["user"] ?? null)) : ?>
    <p>Du måste logga in för att se detta innehåll</p>
    <?php return; ?>
<?php endif; ?>
<h2>If you can see this text, it means you are logged in</h2>
<p>The user <b><?= $_SESSION["user"] ?></b> is currently logged in.</p>
