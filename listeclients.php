<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Liste clients</title>
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
								<h1>Liste des clients</h1>
							</header>
							<p>Ici vous pouvez voir tous les clients enregistrés</p>
                        <br>
                        <div class="posts">
                            <article>
                               <?php
                              // Inclusion du fichier de connexion à la base de données
                              include 'connexion.php';

                             // Requête SQL pour sélectionner tous les clients
                             $sql = "SELECT ID_client, Nom_client, Prenom_client FROM client";

                              // Exécution de la requête
                              $result = $connect->query($sql);

                              // Vérification s'il y a des clients
                              if ($result->rowCount() > 0) {
                              echo "<h2>Clients enregistrés :</h2>";
                              echo "<ul>";
                           // Parcourir les résultats et afficher chaque client
                             while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                             echo "<li>ID : " . $row['ID_client'] . "<br> Nom : " . $row['Nom_client'] . ", <br> Prénom : " . $row['Prenom_client'] . "</li>";
                             }
                             echo "</ul>";
                             } else {
                             echo "Aucun client enregistré.";
                              }
                              ?>
                            </article>
                        </div>
                            </div>
						<span class="image object">
							<img src="images/pic08.jpg" alt="" />
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