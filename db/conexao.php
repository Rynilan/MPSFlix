<?php
$db_data = json_decode(file_get_contents('../info.json'), true)['database'];
print_r($db_data);
$conn = new mysqli(
	$db_data['host'], $db_data['user'], $db_data['password'], $db_data['database']
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>
