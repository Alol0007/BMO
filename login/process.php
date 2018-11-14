<h1>Status</h1>

<p>Check if the user is logged in and then show details on the logged in user.</p>

<?php if ($_SESSION["user"] ?? null) : ?>
    <p>The user <b><?= $_SESSION["user"] ?></b> is currently logged in.</p>
    <p>The users real name is <b><?= $_SESSION["name"] ?></b>.</p>
<?php else : ?>
    <p>No user is logged in.</p>
<?php endif; ?>
<?php
// om inte type finns, så blir de en tom sträng, om inte ID finns då blire null
$id = $_POST["id"] ?? null;
$category = $_POST["category"] ?? "";
$title = $_POST["title"] ?? "";
$content = $_POST["content"] ?? "";
$author = $_POST["author"] ?? "";
$pubdate = $_POST["pubdate"] ?? "";
//action för att veta vilken knapp man trycker på
$action = $_POST["action"] ?? "";

$db = connectToDatabase($dsn); //"UPDATE fruits SET Type = ?, Color = ?, Amount = ? WHERE Id = ?"
if ($action == "Update") {
    $stmt = $db->prepare("UPDATE Article SET category = ?, title = ?, content = ?, author = ?, pubdate = ? WHERE id = ?");
    $params = [$category, $title, $content, $author, $pubdate, $id];
    $stmt->execute($params);
}

if ($action == "Create") {
    $stmt = $db->prepare("INSERT INTO Article (category, title, content, author, pubdate) VALUES (?, ?, ?, ?, ?)");
    $params = [$category, $title, $content, $author, $pubdate];
    $stmt->execute($params);
}

if ($action == "Delete") {
    $stmt = $db->prepare("DELETE FROM Article WHERE Id = $id");
    $stmt->execute();
}

header("Location: login.php?page=read");
