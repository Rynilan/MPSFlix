<?php
$json = file_get_contents('../info.json');
$data = json_decode($json, true)['free_database'];
unset($json);

$host = $data['host'];
$name = $data['database'];
$dsn = 'mysql:host='.$host.';dbname='.$name;
$user = $data['user'];
$pass = $data['password'];

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
