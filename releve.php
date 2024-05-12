<!DOCTYPE HTML>
<html>
<head>
    <title>Relevé de compte</title>
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

                <!-- Content -->
            		<!-- Banner -->
					<section id="banner">
						<div class="content">
							<header>
								<h1>Relevé de compte</h1>
							</header>
                            <p>Ici vous pouvez consulter le relevé d'un compte</p>
                        <p>Entrez le nom ou le prénom du client afin d'apercevoir son porte-feuille</p>
                            <br>

                        <label for="client">Saisissez l'identifiant du client :</label>
                        <input type="text" id="client" onclick="rechercherClients()" placeholder="Rechercher un client" style="width: 200px;">

                        <select id="clientsList" onchange="afficherInformationsClient(this.value)" style="display:none;"></select>

                        <div id="informationsClient"></div>
                        </div>
						<span class="image object">
							<img src="images/pic03.jpg" alt="" />
						</span>
					</section>
				</div>
			</div>

            <?php
include 'connexion.php';

// Requête SQL pour récupérer le relevé de compte 
$requete = "SELECT * FROM operationbancaire WHERE compte_source_id = ? OR compte_destination_id = ?";
$statement = $connect->prepare($requete);

// Assurez-vous que $compte_id est défini, par exemple $compte_id = 123;
$compte_id = 123;

$statement->bindParam(1, $compte_id, PDO::PARAM_INT);
$statement->bindParam(2, $compte_id, PDO::PARAM_INT);

$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<p>Type: " . $row['type'] . ", Montant: " . $row['montant'] . ", Date: " . $row['date'] . "</p>";
}

// Fermeture de la connexion
$connect = null;
?>

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
                                <li><a href="depot.php">Dépot bancaire</a></li>
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
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function rechercherClients() {
            var clientInput = document.getElementById('client').value;
            var clientsList = document.getElementById('clientsList');
            clientsList.style.display = 'none'; // Hide the select element

            // Make AJAX request to get clients
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var clients = JSON.parse(xhr.responseText);
                        clientsList.innerHTML = ''; // Clear previous options
                        clients.forEach(function(client) {
                            var option = document.createElement('option');
                            option.value = client.id;
                            option.textContent = client.Nom_client + ' ' + client.Prenom_client;
                            clientsList.appendChild(option);
                        });
                        clientsList.style.display = 'block'; // Show the select element
                    } else {
                        console.error('Erreur lors de la requête AJAX : ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'get_clients.php?client=' + clientInput, true);
            xhr.send();
        }

        function afficherInformationsClient(clientId) {
            var informationsClient = document.getElementById('informationsClient');

            // Make AJAX request to get client information
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        informationsClient.innerHTML = xhr.responseText;
                    } else {
                        console.error('Erreur lors de la requête AJAX : ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', 'get_client_info.php?id=' + clientId, true);
            xhr.send();
        }
    </script>

</body>
</html>
