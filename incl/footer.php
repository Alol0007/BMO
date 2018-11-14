<?php
$numFiles   = count(get_included_files());
$memoryUsed = memory_get_peak_usage(true);
$loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
?>
        <div class= "footer1">
        <p>Denna sida underhålls av ROHOLM AB</p><p>Telefonnummer: 0737516291</p><p>Epost: ROHOLM.AB@gmail.com</p>
        <p>Time to load page: <?= round($loadTime, 3) ?> . Files included: <?= $numFiles ?>. Memory used: <?= $memoryUsed ?>.</p>
        </div>
