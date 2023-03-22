<html>
  <head>
    <title>PHP Lister les acteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Gestion des erreurs</h1>
    <?php
        require_once './include/login.inc.php';
   
          
        $reals=["Darabonts","Coppola"];

        $req="SELECT titre, realisateur, annee FROM films WHERE realisateur=:monRealisateur";
        $result = $bdd->prepare($req);

        foreach($reals as $unRealisateur)
        {
            $result->bindParam(':monRealisateur', $unRealisateur, PDO::PARAM_INT);
            try {
                $result->execute();
            }
            catch(PDOException $e) {
                $erreur = $e->getMessage();
            }
            if (!isset($erreur)) 
            {
                echo "<h2>".$unRealisateur."</h2>";
                echo "<table class='table table-striped'><tbody><thead><tr><th scope='col'>Nom du film</th><th scope='col'>Année de la sortie du film</th></tr></thead>";
                while($film = $result->fetch())
                {
                    ?>
                <tr><td><?= $film['titre'] ?></td> 
                <td><?= date("Y",strtotime($film['annee'])) ?></td> </tr> 
                    <?php
                }
                ?>
                </tbody>
                </table>
                <?php
            }
            else
            {
                if (isset($message) AND $message===$erreur)
                {
                    echo "<h4>".$erreur."</h4>";
                }
                $message=$erreur;
            }
        }
        // Fermeture de la connexion
        $bdd = null;
        ?>
  </body>
</html>