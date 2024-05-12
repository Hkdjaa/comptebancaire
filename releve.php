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

                    <select id="clientsList" onchange="afficherInformationsClient(this.value)" style="display:none;"></select>

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
    $(document).ready(function() {
        // Lorsque l'utilisateur tape dans le champ de recherche
        $('#client').on('keyup', function() {
            var searchText = $(this).val(); // Récupérer le texte saisi par l'utilisateur
            if (searchText !== '') {
                // Faire une requête AJAX pour récupérer les clients correspondants
                $.ajax({
                    url: 'get_clients.php', // L'URL où vous récupérez les clients
                    method: 'GET',
                    data: {search: searchText}, // Envoyer le texte de recherche au serveur
                    dataType: 'json',
                    success: function(response) {
                        var clientsList = $('#clientsList');
                        clientsList.empty(); // Vider la liste déroulante
                        if (response.length > 0) {
                            // Ajouter chaque client à la liste déroulante
                            $.each(response, function(index, client) {
                                clientsList.append('<option value="' + client.id + '">' + client.nom + ' ' + client.prenom + '</option>');
                            });
                            clientsList.show(); // Afficher la liste déroulante
                        } else {
                            clientsList.hide(); // Masquer la liste déroulante s'il n'y a pas de correspondance
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors de la requête AJAX : ' + error);
                    }
                });
            } else {
                $('#clientsList').hide(); // Masquer la liste déroulante si le champ de recherche est vide
            }
        });

        // Lorsque l'utilisateur sélectionne un client dans la liste déroulante
        $('#clientsList').on('change', function() {
            var clientId = $(this).val();
            afficherInformationsClient(clientId);
        });
    });

    function afficherInformationsClient(clientId) {
        var informationsClient = $('#informationsClient');
        // Faire une requête AJAX pour afficher les informations du client sélectionné
        $.ajax({
            url: 'get_client_info.php',
            method: 'GET',
            data: {id: clientId},
            success: function(response) {
                informationsClient.html(response);
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la requête AJAX : ' + error);
            }
        });
    }
</script>


</body>
</html>
