<?php
$db = connectToDatabase($dsn);
$object = $_GET["object"] ?? null;
$res = getOneObject($db, $object);
//print_r($res);
try {
    $stmt = $db->prepare("SELECT title, category, text, image FROM Object WHERE id = $object");
} catch (PDOException $e) {
    header("Location: objects.php?page=index");

}
$stmt ->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = printObjectResultsetToHTMLTable2($res);

?>



        <a href="javascript:javascript:history.go(-1)">Tryck här för att gå tillbaka ett steg</a>


            <table>
        <tr>

            <th>Titel</th>
            <th>Kategori</th>
            <th>Innehåll</th>
            <th>Bild</th>
        </tr>
            <?=$rows?>
            </table>
