<?php
// releve.php

require_once 'connexion.php';

class Client {
    protected $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function getMatchingClients($search) {
        $sql = "SELECT * FROM Client WHERE Nom_client LIKE :search OR Prenom_client LIKE :search";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute(['search' => "%$search%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Instanciation de la classe Client avec la connexion à la base de données
$clientManager = new Client($connect);

?>


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
    <input type="text" id="client" onkeyup="rechercherClients()" placeholder="Rechercher un client" style="width: 200px;">
    <select id="clientsList" style="display:none;"></select>
    <div id="informationsClient"></div>
                </div>
                <span class="image object">
                    <img src="images/pic03.jpg" alt="" />
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
                        <span class="opener">Création</span>
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
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<!-- Incluez jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function rechercherClients() {
            var searchText = $('#client').val();
            if (searchText !== '') {
                $.ajax({
                    url: 'releve_search_clients.php',
                    method: 'GET',
                    data: { search: searchText },
                    dataType: 'json',
                    success: function(response) {
                        var clientsList = $('#clientsList');
                        clientsList.empty();
                        if (response.length > 0) {
                            $.each(response, function(index, client) {
                                clientsList.append('<option value="' + client.ID_client + '">' + client.Nom_client + ' ' + client.Prenom_client + '</option>');
                            });
                            clientsList.show();
                        } else {
                            clientsList.hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors de la requête AJAX : ' + error);
                    }
                });
            } else {
                $('#clientsList').hide();
            }
        }

        // Fonction pour afficher les informations du client sélectionné
        function afficherInformationsClient(clientId) {
            // Faire une autre requête AJAX pour récupérer les informations du client et les afficher dans #informationsClient
        }
    </script>


</body>
</html>
