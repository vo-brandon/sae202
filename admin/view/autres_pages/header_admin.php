<?php
if (!isset($_SESSION))
	session_start();
$page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<link href="/view/css/style.css" type="text/css" rel="stylesheet" />
<header>
	<a href="/" id="logo"><img src="/view/images/room107-brown.png" alt="Home"></a>
	<div>
		<a href="/" class="nav-icon-button"><img src="/view/images/home.svg" alt="Retour à l'accueil"
				class="nav-icon-button">
			<p class="nav-text-button">RETOUR ACCUEIL</p>
		</a>
		<span></span>
	</div>
	<div class="admin-menu">
		<a href="/admin/dashboard"><img src="/view/images/admin.svg" alt="Dashboard Admin" class="nav-icon-button">
			<p class="nav-text-button">DASHBOARD</p>
		</a>
		<a href="/admin/membres"><img src="/view/images/profil.svg" alt="Gestion Membres" class="nav-icon-button">
			<p class="nav-text-button">MEMBRES</p>
		</a>
		<a href="/admin/reservations"><img src="/view/images/bed-img.png" alt="Réservations" class="nav-icon-button">
			<p class="nav-text-button">RÉSERVATIONS</p>
		</a>
		<a href="/admin/commentaires"><img src="/view/images/commentaire_valide_view.php" alt="Commentaires"
				class="nav-icon-button">
			<p class="nav-text-button">COMMENTAIRES</p>
		</a>
		<a href="/admin/messagerie"><img src="/view/images/contact.svg" alt="Messagerie" class="nav-icon-button">
			<p class="nav-text-button">MESSAGERIE</p>
		</a>
	</div>
	<?php if (isset($_SESSION['user'])) { ?>
		<a href="/deconnexion" class="oval-button deconnexion-btn">Déconnexion</a>
	<?php } ?>
</header>