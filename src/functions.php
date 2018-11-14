<?php
/**
 * Definitions of commonly used functions.
 */
include("config.php");



/**
 * Definitions of commonly used functions.
 */

/**
 * Destroy a session, the session must be started.
 *
 * @return void
 */
function sessionDestroy()
{
    // Unset all of the session variables.
    $_SESSION = [];

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

function connectToDatabase($dsn)
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
        throw $e;
    }
    return $db;
}

function printArticleResultsetToHTMLTable($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td><a href ='articles.php?page=read&article={$row["id"]}'>Läs</a></td>";
        $rows .= "<td>{$row["category"]}</td>";
        $rows .= "<td>{$row["title"]}</td>";
        $rows .= "<td>{$row["content"]}</td>";
        $rows .= "<td>{$row["author"]}</td>";
        $rows .= "<td>{$row["pubdate"]}</td></tr>";
    }
    return $rows;
}

function printArticleResultsetToHTMLTable6($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td>{$row["id"]}</td>";
        $rows .= "<td>{$row["category"]}</td>";
        $rows .= "<td>{$row["title"]}</td>";
        $rows .= "<td>{$row["content"]}</td>";
        $rows .= "<td>{$row["author"]}</td>";
        $rows .= "<td>{$row["pubdate"]}</td>";
        $rows .= "<td><a href ='login.php?page=update&article={$row["id"]}'>Update</a> | <a href ='login.php?page=delete&article={$row["id"]}'>Delete</a> |  <a href ='login.php?page=create&article={$row["id"]}'>Create</a></td></tr>";
    }
    return $rows;
}



function printArticleResultsetToHTMLTable2($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td>{$row["title"]}</td>";
        $rows .= "<td>{$row["content"]}</td>";
        $rows .= "<td>{$row["author"]}</td>";
        $rows .= "<td>{$row["pubdate"]}</td></tr>";
    }
    return $rows;
}

function printArticleResultsetToHTMLTable3($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td><a href ='articles.php?page=read&article={$row["id"]}'>Läs</a></td>";
        $rows .= "<tr><td>{$row["title"]}</td>";
        $rows .= "<td>{$row["author"]}</td>";
        $rows .= "<td>{$row["pubdate"]}</td></tr>";
    }
    return $rows;
}

function printArticleResultsetToHTMLTable4($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td>{$row["content"]}</td></tr>";
    }
    return $rows;
}

function printObjectResultsetToHTMLTable($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td>{$row["id"]}</td>";
        $rows .= "<td>{$row["title"]}</td>";
        $rows .= "<td>{$row["category"]}</td>";
        $rows .= "<td>{$row["text"]}</td>";
        $rows .= "<td>{$row["image"]}</td>";
        $rows .= "<td>{$row["owner"]}</td></tr>";
    }
    return $rows;
}
function printObjectResultsetToHTMLTable2($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td>{$row["title"]}</td>";
        $rows .= "<td>{$row["category"]}</td>";
        $rows .= "<td>{$row["text"]}</td>";
        $rows .= "<td>{$row["image"]}</td><tr>";
    }
    return $rows;
}

function printObjectResultsetToHTMLTable3($res)
{
    $rows = "";
    foreach ($res as $row) {
        $rows .= "<tr><td><a href ='objects.php?page=read&object={$row["id"]}'>Läs</a><td>";
        $rows .= "<td>{$row["title"]}</td>";
        $rows .= "<td>{$row["category"]}</td>";
        $rows .= "<td>{$row["text"]}</td>";
        $rows .= "<td>{$row["image"]}</td><tr>";
    }
    return $rows;
}
function getOneArticle($db, $article)
{
    $params = [$article];
    $stmt = $db->prepare("SELECT * FROM Article WHERE id = ?");
    $stmt->execute($params);
    // get the reults as an array with columns names as arary keys
    return $stmt->fetch();
}

function getOneObject($db, $object)
{
    $params = [$object];
    $stmt = $db->prepare("SELECT * FROM Object WHERE id = ?");
    $stmt->execute($params);
    // get the reults as an array with columns names as arary keys
    return $stmt->fetch();
}
