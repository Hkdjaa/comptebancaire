<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Depot d'argent</title>
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
								<h1>Dépot bancaire</h1>
							</header>
							<p>Remplissez ce formulaire pour faire un dépot d'argent sur un compte client</p>
                            <div class="posts">
							<article>
								<form action="" method="post">
									<div class="fields">
										<div class="field">
											<label for="id">Identifiant</label>
											<input type="text" name="id" id="id" placeholder="Numéro bancaire" required />
										</div>
										<div class="field">
											<label for="somme">Montant</label>
											<input type="number" name="montant" id="montant" placeholder="Montant" required />
										</div>
                                        <br>
										<div class="field">
											<input type="submit" value="Faire le dépot" class="button primary" />
										</div>
                                        <?php

// Connexion à la base de données
include 'connexion.php';

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEnvoyeur = $_POST["id1"];
    $idDestinataire = $_POST["id2"];
    $montant = $_POST["montant"];

    // Création de l'objet OperationBancaire avec la connexion à la base de données
    $operationBancaire = new OperationBancaire($connect);

    // Appel de la méthode effectuerVirement pour effectuer le virement
    $resultat = $operationBancaire->effectuerVirement($idEnvoyeur, $idDestinataire, $montant);
    echo $resultat;
}
?>
									</div>
								</form>
							</article>
						</div>
						</div>
						<span class="image object">
							<img src="images/pic02.jpg" alt="" />
						</span>
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