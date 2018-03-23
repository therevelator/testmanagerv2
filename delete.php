<?php

$user = $_SESSION['username'];
@$name = $_POST['ProjectName'];
@$description = $_POST['Description'];
$timestamp = date("Y-m-d H:i:s");
try {
$host = '127.0.0.1';
$db   = 'testmanager';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$ID = $_POST['DeleteID'];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
$stmt = $pdo->query("DELETE FROM projects WHERE ID = '".$ID."'");
// while ($row = $stmt->fetch())
// {
//     echo $row['name'] . "\n";
// }
} catch (Exception $e) {
  $error = $e->getMessage();
  echo $error;
}
