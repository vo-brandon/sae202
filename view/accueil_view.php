<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&display=swap"
		rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="/view/images/rose-logo.png">
	<title>Murder Party</title>
</head>

<body>
	<?php include __DIR__ . '/autres_pages/header.php'; ?>

	<main>
		<div id="page-max-width">
			<div id="title">
				<div>
					<h1 class="title" id="page-title">MURDER</h1>
					<img src="/view/images/stamp.png" alt="Tampon" id="hero-stamp">
				</div>
				<div>
					<h1 class="title" id="page-title">PARTY</h1>
					<p id="title-text">Une Murder Party est un jeu d'enquête grandeur nature, souvent immersif et
						scénarisé, où les participant·es incarnent des personnages impliqués dans une intrigue
						criminelle, généralement un meurtre. Le but est d"enquêter, d"échanger, de manipuler (parfois !)
						et de résoudre l"affaire… ou de cacher sa propre culpabilité.L'ambiance oscille entre théâtre
						interactif et jeu de rôle, dans un cadre souvent mystérieux et soigneusement mis en scène</p>
				</div>
			</div>

			<div id="hero">
				<img src="/view/images/hero.png" alt="Décor Murder Party"
					style="width:100%;height:100%;object-fit:cover;">
			</div>

			<img src="/view/images/rose.png" alt="rose" id="hero-rose" class="absolute-side-image">

			<section id="team">
				<div id="text">
					<h1 class="title">Qui somme nous ?</h1>
					<a href="/" class="oval-button">en savoir plus</a>
					<a href="/" class="oval-button">EVENCIE</a>
				</div>
				<div id="calendar">
					<div id="date-timeline">
						<div>
							<div class="note">
								<h3>CRÉATION DE NOTRE AGENCE</h3>
								<div id="dot">⬇</div>
							</div>
							<div class="note">
								<h3>CRÉATION DE NOTRE AGENCE</h3>
								<div id="dot">⬇</div>
							</div>
						</div>
						<div id="line"></div>
					</div>
					<div id="dates">
						<div>
							<h1 class="title">2024</h1>
							<h2>EVENCIE</h2>
							<p>Nous sommes six étudiant·e·s réuni·e·s autour de cette même énergie créative. Ensemble,
								nous avons fondé une agence dédiée à la conception de projets numériques à la fois
								ambitieux, ludiques et immersifs. Nos compétences complémentaires — en développement
								web, création numérique et communication visuelle.</p>
						</div>
						<div>
							<h1 class="title">2025</h1>
							<h2>ROOM 107 .</h2>
							<p>Notre agence a imaginé et conçu de bout en bout une murder party immersive intitulée Room
								107, pensée pour se dérouler dans un hôtel. Nous avons créé l’univers, écrit le
								scénario, défini les personnages, conçu les énigmes et l’identité visuelle. Chaque
								élément a été imaginé sur mesure pour plonger les participants dans une atmosphère
								mystérieuse et captivante.</p>
						</div>
					</div>
				</div>
			</section>
		</div>

		<section id="presentation">
			<div id="images">
				<div id="elem1">
					<img src="/view/images/table-img.png" alt="Table" style="width:100%;height:100%;object-fit:cover;">
				</div>
				<div id="elem2">
					<img src="/view/images/phone-img.png" alt="Téléphone"
						style="width:100%;height:100%;object-fit:cover;">
				</div>
			</div>
			<div id="text">
				<p>Mystérieux</p>
				<p>Hôtel</p>
				<p>Énigmatique</p>
				<p>Familial</p>
				<img src="/view/images/room107-white.png" alt="Room107">
			</div>
		</section>

		<div id="page-max-width">
			<section id="enigme">
				<p>Vous souhaitez tenter l'expérience murder entre amis ou en famille ? Venez participer à nos murders
					avec comédiens dédiés au grand public !</p>
				<h1 class="title">QUI A ASSASINÉ Mme. ROSE ?</h1>
				<a href="/" class="oval-button">En savoir plus</a>
			</section>

			<img src="/view/images/horloge.png" alt="horloge" id="comments-clock" class="absolute-side-image">
			<img src="/view/images/etoile.png" alt="étoile" id="comments-star" class="absolute-side-image">

			<section id="comments">
				<h1>AVIS DE NOS CLIENTS</h1>
				<hr>
				<?php
				require_once(__DIR__ . '/../model/commentaire_front_model.php');
				$commentaires = get_commentaires_valides();
				$commentaires = array_slice($commentaires, 0, 3);
				$images = [
					'/view/images/board-img.png',
					'/view/images/bed-img.png',
					'/view/images/key-img.png'
				];
				foreach ($commentaires as $i => $c):
					$image = $images[$i] ?? $images[0];
					?>
					<article class="comment">
						<div class="comment-img"
							style="background-image: url('<?= $image ?>'); background-size: cover; background-position: center;">
						</div>
						<div class="comment-content">
							<h2 class="title"><?= htmlspecialchars($c['prenom']) . ' ' . htmlspecialchars($c['nom']) ?></h2>
							<p><?= nl2br(htmlspecialchars($c['contenu'])) ?></p>
							<a href="/commentaire">VOIR PLUS</a>
						</div>
					</article>
					<hr>
				<?php endforeach; ?>
				<a href="/commentaire" class="oval-button">voir plus</a>
			</section>
		</div>
	</main>
</body>

</html>