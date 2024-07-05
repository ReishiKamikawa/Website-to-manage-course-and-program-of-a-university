<?php
$dsn = 'mysql:host=localhost;port=2702;dbname=new_schema';
$username = 'root';
$password = '123456';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = urlencode($e->getMessage());
    header('Location: database_error.php?error_message=' . $error_message);
    exit();
}
?>