<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$base_url = $protocol . $_SERVER['HTTP_HOST'] . '/';
if (strpos($base_url, 'localhost') !== false) {
	$base_url = $base_url.'MPSFlix/';
	define('ROOT_PATH', '/opt/lampp/htdocs/MPSFlix/');
} else {
	define('ROOT_PATH', rtrim(__DIR__, 'config/').'/');
}
define('ROOT_URL', $base_url);
?>
