<?php
$json = file_get_contents('../info.json');
$data = json_decode($json, true)['database'];
unset($json);

$host = $data['host'].':3306';
$name = $data['database'];
$dsn = 'mysql:host='.$host.';dbname='.$name;
$user = $data['user'];
$pass = $data['password'];

try {
$conexao = new mysqli($host, $user, $pass, $name);
} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
}

unset($host);
unset($name);
unset($dsn);
unset($user);
unset($pass);
unset($data);

// Check connection
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
} else {
    $conexao->set_charset('utf8');
}
?>
