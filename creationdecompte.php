<!DOCTYPE HTML>
<!--
    Editorial by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Création de compte</title>
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
                                <h1>Création de compte</h1>
                            </header>
                            <p>Remplissez ce formulaire pour créer un compte!</p>
                            <br>
                            <div class="posts">
                                <article>
                                    <form action="" method="post">
                                        <div class="fields">
                                            <div class="field">
                                                <label for="numero_compte">Numéro de compte</label>
                                                <input type="text" name="numero_compte" id="numero_compte" placeholder="Numéro de compte" required />
                                            </div>
                                            <br>
                                            <div class="field">
                                                <label for="id">Identifiant du client</label>
                                                <input type="text" name="id" id="id" placeholder="Identifiant du client" required />
                                            </div>
                                            <br>
                                            <div class="field">
                                                <input type="submit" value="Créer le compte" class="button primary" />
                                            </div>
                                            <br>
                                            <?php
                                            // Vérification si le formulaire a été soumis
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                // Inclusion du fichier de connexion à la base de données
                                                include 'connexion.php';
                                                include 'comptebancaire.php';

                                                // Récupération des données du formulaire
                                                class creation extends comptebancaire{
                                                    protected $id;
                                                    protected $numero_compte;

                                                    function __construct($id,$numero_compte){
                                                        $this->id=$id;
                                                        $this->numero_compte=$numero_compte;
                                                    }
                                                }
                                                // Classe pour gérer la connexion à la base de données
                                                class Database {
                                                    private $host = 'mysql-memarch.alwaysdata.net';
                                                    private $dbname = 'memarch_banque';
                                                    private $username = 'memarch';
                                                    private $password = 'Memarch.2024';
                                                    private $conn;
                                            
                                                    public function connect() {
                                                        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
                                                        $options = array(
                                                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                                                        );
                                            
                                                        try {
                                                            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
                                                        } catch(PDOException $e) {
                                                            echo 'Erreur de connexion : ' . $e->getMessage();
                                                        }
                                            
                                                        return $this->conn;
                                                    }
                                            
                                                    public function createAccount($numero_compte) {
                                                        $sql = "INSERT INTO comptebancaire (numero_compte) VALUES (?)";
                                                        $stmt = $this->conn->prepare($sql);
                                                        return $stmt->execute([$numero_compte]);
                                                    }
                                                }
                                            
                                                $db = new Database();
                                                $conn = $db->connect();
                                            
                                                $numero_compte = $_POST['numero_compte'];
                                            
                                                if ($db->createAccount($numero_compte)) {
                                                    echo "Compte créé avec succès !<br>";
                                                } else {
                                                    echo "Erreur lors de la création du compte.";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </form>
                                </article>
                            </div>
                        </div>
                        <span class="image object">
                            <img src="images/pic07.jpg" alt="" />
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
