<?php
$title = "Min Multisida| htmlphp";
include("incl/header.php");
?><!DOCTYPE html>




    <body>
        <aside>
            <nav class ="multipage" style="list-style-type: none;">
                <ul class="multipage2" style="list-style-type: none;">
                <?php foreach ($pages as $key => $value) : ?>
                    <?php
                    $selected = null;
                    if ($key === $pageReference) {
                        $selected = "class=\"selected\"";
                    }
                    ?>
                    <li><a <?= $selected ?> href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>

                <?php endforeach; ?>
                </ul>
            </nav>
        </aside>
    </body>
