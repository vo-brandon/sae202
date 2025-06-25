<?php
if (!isset($_SESSION))
	session_start();
$page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<link rel="stylesheet" href="/view/css/style.css" />
<header<?php if ($page === 'info' || $page === 'info.php')
	echo ' id="black"'; ?>>
	<a href="/" id="logo"><img
			src="/view/images/room107-<?php echo ($page === 'info' || $page === 'info.php') ? 'white' : 'brown'; ?>.png"
			alt="Home"></a>
	<div>
		<a href="/"><img src="/view/images/home.svg" alt="Home Button" class="nav-icon-button">
			<p class="nav-text-button">ACCUEIL</p>
		</a>
		<span></span>
	</div>
	<div>
		<a href="/concept"><img src="/view/images/concept.svg" alt="Concept Button" class="nav-icon-button">
			<p class="nav-text-button">CONCEPT</p>
		</a>
		<span></span>
	</div>
	<div>
		<a href="/info"><img src="/view/images/info.svg" alt="Info Button" class="nav-icon-button">
			<p class="nav-text-button">INFO PRATIQUES</p>
		</a>
		<span></span>
	</div>
	<?php
	if (!isset($_SESSION['user']) || (($_SESSION['user']['role'] ?? '') !== 'admin')) {
		?>
		<div>
			<a href="/messagerie_user"><img src="/view/images/contact.svg" alt="Messagerie Button" class="nav-icon-button">
				<p class="nav-text-button">MESSAGERIE</p>
			</a>
			<span></span>
		</div>
	<?php }
	if (isset($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin') {
		?>
		<div>
			<a href="/admin/controller/admin_controller.php"><img src="/view/images/admin.svg" alt="Admin Button"
					class="nav-icon-button">
				<p class="nav-text-button">ADMIN</p>
			</a>
			<span></span>
		</div>
	<?php }
	if (isset($_SESSION['user'])) {
		if ($page === 'profil' || $page === 'profil.php') { ?>
			<a href="/deconnexion" class="oval-button deconnexion-btn">Déconnexion</a>
		<?php } else { ?>
			<div>
				<a href="/profil"><img src="/view/images/profil.svg" alt="Profil Button" class="nav-icon-button">
					<p class="nav-text-button">PROFIL</p>
				</a>
				<span></span>
			</div>
			<a href="/reservation_user" class="oval-button">RESERVER</a>
		<?php }
	} else { ?>
		<a href="/connexion" class="oval-button">CONNEXION</a>
	<?php } ?>
	</header>