<?php if (!($_SESSION["user"] ?? null)) : ?>
    <p>Du måste logga in för att se detta innehåll</p>
    <?php return; ?>
<?php endif; ?>
<form method="post" action="?page=logout-process">

    <fieldset>
        <legend>Logout</legend>

        <input type="submit" name="logout" value="Logout">

    </fieldset>

</form>
