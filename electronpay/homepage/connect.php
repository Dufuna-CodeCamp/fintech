<?php
#SetUp Connection
$usernameDB = "emancipator";//insert your database username
$passwordDB = "emma21995";//insert your database password

try {
    $pdo = new PDO("mysql:host=localhost", $usernameDB, $passwordDB);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully. Host info: " . $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS")) . "<br>";

} catch (PDOException $e) {
    die ("ERROR: Could not connect. " . $e->getMessage()) . "<br>";
}

?>