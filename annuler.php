<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Annuler une transaction d'argent</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">
				<div class="inner">

					<!-- Header -->
					<header id="header">
						<a href="accueil.php" class="logo"><strong>DO & GO</strong> by MFH</a>
						<ul class="icons">
							<li><a href="#" class="icon brands fa-google"><span class="label">Gmail</span></a></li>
						</ul>
					</header>

					<!-- Banner -->
					<section id="banner">
						<div class="content">
							<header>
								<h1>Récuperer le montant d'un virement bancaire</h1>
							</header>
							<p>Remplissez ce formulaire pour anuler une transaction</p>
						</div>
						<span class="image object">
							<img src="images/pic05.jpg" alt="" />
						</span>
					</section>
					
					<section>
						<div class="posts">
                        <article>

<h2>Recherche de client</h2>

<label for="client">Saisissez l'identifiant du client :</label>
<input type="text" id="client" onkeyup="rechercherClient(this.value)">

<select id="listeClients">
    <!-- Les options seront ajoutées dynamiquement -->
</select>

<div id="informationsClient">
    <!-- Les informations du compte bancaire seront affichées ici -->
</div>

					<!-- Tableau des relevés -->
                                <!-- mettre la liste des récentes transactions d'un clients, pour en choisir une et l'annuler, avec php-->
							</article>
						</div>
					</section>
				</div>
			</div>

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">

					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li><a href="accueil.php">Accueil</a></li>
							<li>
								<span class="opener">Créationn</span>
								<ul>
									<li><a href="creation.php">Création client</a></li>
									<li><a href="creationdecompte.php">Création de compte</a></li>
								</ul>
							</li>
							<li><a href="releve.php">Relevé d'un compte</a></li>
							<li>
								<span class="opener">Gestion de compte</span>
								<ul>
									<li><a href="depot.php">Dépôt bancaire</a></li>
									<li><a href="retrait.php">Retrait bancaire</a></li>
									<li><a href="virement.php">Virement bancaire</a></li>
									<li><a href="annuler.php">Annuler transaction</a></li>
								</ul>
							</li>
							<li><a href="listeclients.php">Liste des clients</a></li>
						</ul>
					</nav>

					<!-- Section -->
					<section>
						<header class="major">
							<h2>Informations de contact supérieur</h2>
						</header>
						<p>Cette application de gestion de comptes bancaires est destinée uniquement aux employés. L'accès à cette application est strictement réservé aux employés autorisés.</p>
						<ul class="contact">
							<li class="icon solid fa-envelope"><a href="#">infosysteme@gmail.com</a></li>
							<li class="icon solid fa-phone">(+221) 77-475-76-56</li>
							<li class="icon solid fa-home">Dakar, Rue 12, Sacré-Coeur<br />
								Sénégal, 11000</li>
						</ul>
					</section>

					<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Tous droits réservés</p>
					</footer>

				</div>
			</div>

		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>