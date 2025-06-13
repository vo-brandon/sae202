<div id="contenu">
	<h1>SAE202</h1>
	<?php
	if (!isset($_SESSION))
		session_start();
	if (isset($_SESSION['user'])) {
		echo '<p>Bienvenue, ' . htmlspecialchars($_SESSION['user']['prenom']) . ' ' . htmlspecialchars($_SESSION['user']['nom']) . '</p>';
	}
	?>
</div>