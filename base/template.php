<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Site para exibir arquivos .mp4 de um drive." />
		<meta name="autor" content="Ilan Vitor e Marcela Paiva" />
        <meta name="robots" content="all" />

		<title>MPSFlix</title>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
		<link href='<?=ROOT_URL?>css/default.css' rel="stylesheet" />
		<?php if (isset($custom_css)): ?>
		<?php foreach ($custom_css as $sheet): ?>
		<link href='<?=ROOT_URL.$sheet['path']?>' rel='stylesheet' />
		<?php endforeach; ?>
		<?php endif; ?>

	</head>
	<body>

		<!-- Cabeçalho -->
		<div id="head">
			<div id='logo'>
				<a href='<?=ROOT_URL?>index.php'>
					<div  id='logo' title='MPSFlix'></div>
				</a>
			</div>
			<div id='menuDiv'>
				<button type="button" id='menuButton'><span class="material-symbols-outlined">menu</span></button>
				<nav id='menuNav' class='hidden'>
					<ul>
						<li><a href="<?=ROOT_URL?>index.php"><span class='material-symbols-outlined'>home</span>Home</a></li>
						<li><a href="<?=ROOT_URL?>page/info.php"><span class='material-symbols-outlined'>info</span>Sobre</a></li>
					</ul>
				</nav>
			</div>
		</div>

		<!-- MainFrame -->
		<div id='background'>
			<div id='vinheta'>
				<div id="main">
					<?php echo (isset($conteudo)) ? $conteudo : http_response_code(404); exit(); ?>
				</div>
			</div>
		</div>

		<!-- Rodapé -->
		<div id="foot">
			<center><p>&copy; Todos os direitos reservados a Marcela Paiva e Ilan Vitor.</p></center>
			<center><p>Direito de uso dado a Rodrigo Santos.</p></center>
			<center><a href='#head'><button id='subir'>Topo</button></a></center>
		</div>
		<script src='<?=ROOT_URL?>js/menu.js'></script>
		<?php if (isset($custom_js)):?>
		<?php foreach ($custom_js as $script):?>
		<script src='<?=ROOT_URL.$script['path']?>'></script>
		<?php endforeach; ?>
		<?php endif;?>

	</body>
</html>
