<html>
  <head>
    <title>PHP Lister les acteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Lister le(s) film(s) d'un réalisateur</h1>
    <?php
        require_once './include/login.inc.php';
    ?>
    <table class="table table-striped">
        <tbody>
            <thead>
                <tr>
                    <th scope="col">Nom du film</th>
                    <th scope="col">Année de la sortie du film</th>
                </tr>
            </thead>
            <?php
            $real ="Darabont";
            $req="SELECT titre, realisateur, annee FROM film WHERE realisateur=:monRealisateur";
            $result = $bdd->prepare($req);
            $result->execute(array(':monRealisateur'=>$real));
            if ($result === false)
            {
                die("erreur requête !");
            }
            echo "<h2>".$real."</h2>";
            while($film = $result->fetch())
            {
                ?>
                <tr>
                <td><?= $film['titre'] ?></td> 
                <td><?= date("Y",strtotime($film['annee'])) ?></td> 
                </tr> 
            <?php
            }
            // Fermeture de la connexion
            $bdd = null;
            ?>
        </tbody>
    </table>
  </body>
</html>