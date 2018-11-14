<?php
$title = "Min about-sida | htmlphp";
include("incl/header.php");
include("src/functions.php");
$db = connectToDatabase($dsn);
// print_r($dsn);
$stmt = $db->prepare("SELECT content FROM Article WHERE id = 4");
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = printArticleResultsetToHTMLTable4($res);
?>
<!DOCTYPE html>
<main>
    <article>

            <link rel="stylesheet" href="/css/style.css">
            <p>Hej!</p>
            <p>Mitt namn är Alex Lopez, 23år. Jag bor i Uddevalla och jobbar 25% på samhällsbyggnadsförvaltningen i Sotenäs kommun. Jag jobbar bl.a. med utveckling och är i nuläget med ett projekt som handlar om att automatisera kostavdrag för lärare m.h.a RFID eller NFC teknologi.</p>
            <p>Min bästa vänn är min katt Tusse som i rådande stund (2018) är 18 år, och vi spenderar gärna vår fritid till att leta kantareller, speciellt såhär i höstetider!</p>
            <img src="img/12570934_10206899833547084_1732671532_n_10206899833547084.jpg" width="10%" alt="tusseyahne">
            <img src="img/12458810_10206773989201054_1596187180_o_10206773989201054.jpg" width="10%" alt="66">
            <img src="img/mig.jpg" alt="mig1" width="8.5%">
            <p>Förutom att sniffa fram kantareller så har jag även lärt honom hur man tar bilder med en Iphone, Tusse har sitt egna tummavtryck för att låsa upp min telefon då han var med och finansierade den.</p>
            <p>Som innan nämnt så skapades denna sidan för den goda sakens skull. I oroliga tider som dessa med allt vad gäller växthuseffekt, inflation och ett skiftande landskap är det allt viktigare att bevara vårt svenska kulturarv</p>
            <?=$rows?>

            <footer>
                <?php include("incl/footer.php"); ?>
            </footer>

    </article>

</main>
