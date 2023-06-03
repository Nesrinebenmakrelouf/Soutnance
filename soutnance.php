<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="Ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>soutenance</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
  <section id="header">
      <img src="logo.png" height="70px" width="140px" id="logo">
        <div>
            <ul id="navbar">
                <li><a class="active" href="acceuil.php">Accueil</a></li>
                <li><a  href="Apropos.php">À propos</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li class="dropdown">
                  <a href="publication.php" class="dropdown-toggle" id="publications-dropdown">Publications</a>
                  <ul class="dropdown-menu" aria-labelledby="publications-dropdown">
                      <li><a href="publication.php">Publication et Communication</a></li>
                      <li><a href="soutnance.php">Theses et mémoires</a></li>
                      <li><a href="publication.php">Evenements Scientifiques</a></li>
                  </ul> 
              </li>
              <li class="dropdown">
                  <a href="projet.php" class="dropdown-toggle" id="projets-dropdown">Projets</a>
                  <ul class="dropdown-menu" aria-labelledby="projets-dropdown">
                      <li><a href="projet.php">Nationaux</a></li>
                      <li><a href="projet.php">Internationaux</a></li>
                  </ul>  
              </li>
              
                <li><a href="contact.php">Contact</a></li>
                
            </ul>
        </div>
    </section>
    <div class="listesou">
        <img src="soutnance (1).png" alt="" height="330px" width="300px" id="img1">
        <div class="listes">
        <h2>Liste des soutenances :</h2></div>
       <img src="soutnance (1).png" height="330px" width="300px" alt="" id="img2">
    </div>  
    <?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lrdsi";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Requête pour récupérer les soutenances avec les informations sur l'encadrant
$sql = "SELECT soutnance.date, soutnance.nomdoc, soutnance.prenomdoc, soutnance.titreth, membre.nom, membre.prenom, membre.grade
        FROM soutnance
        INNER JOIN membre ON soutnance.id_m = membre.id_m";
$result = $conn->query($sql);

// Affichage des soutenances
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<sectin class="soutnance" > 
          <div class="cadres">
             <div class="titres">
               <p>Titre de Thèse: ' . $row["titreth"] . '</p>
             </div>
               <div class="infos">
               <p><img src="icons8-user-male-50.png" alt="" height="30px"><span>  Encadrant: </span> ' . $row["nom"] . ' '. $row["prenom"] .' ('. $row["grade"] .')</p>
               <p><img src="icons8-people-50.png" alt="" height="30px"><span>  Doctorant:  </span> ' . $row["nomdoc"] .' - '. $row["prenomdoc"] . '</p>
               <p></p><img src="icons8-date-50.png" alt="" height="30px"><span> Date :</span> '. $row["date"] . ' </p> <br>
              </div>
            </div>
           </section>'  ;
    }
} else {
    echo "Aucune soutenance trouvée.";
}
// Fermeture de la connexion à la base de données
$conn->close();
?>

    <section>
      <!--Start Footer -->
      <br><div class="footer" Align="center"> <br>
        <img src="logo.png" height="75px" width="160px" id="logo" Align="left">
        <img src="logo.png" height="75px" width="160px" id="logo" Align="right">
        <h3>LABORATOIRE DE RECHERCHE POUR LE DEVELOPPEMENT DES SYSTEMES INFORMATISES <br> Université Saad Dahlab - Blida 1  |  Faculté des Sciences  </h3> <br>
        <h2>Tel: + 213 (0)25 27 24 36  <br> Email: lrdsi@univ-blida.dz</h2>
        <br><p class="copyright"> &copy; 2023 All Rights Reserved to LRDSI</p>
      </div>

    </section>
  </body>
  </html> 
