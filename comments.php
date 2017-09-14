<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Comments</title>
  </head>
  <body>
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'gj7b!17LA');
    } catch (Exception $e) {
        die('Erreur :'. $e->getMessage());
    }

    $article = $_GET["contents"];

$req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
$req->execute(array($article));

$donnees = $req->fetch();
?>
<h1><?php echo $donnees['titre']; ?></h1>
<p>
  <?php echo $donnees['contenu']; ?><br>
  <?php echo $donnees['date_creation']; ?>

<?php
$req->closeCursor();
  ?>

<?php

$req = $bdd->prepare('SELECT comments.auteur FROM comments INNER JOIN articles ON articles.id = comments.id_articles');


$req = $bdd->prepare('SELECT * FROM comments, articles WHERE comments.id_articles=articles.id');
$req->execute(array('comments.id_articles'));

$info = $req->fetch();

?>

<h3>Commentaires :</h3>
<p>
  <?php echo $info['auteur']." : "; ?><br>
  <?php echo $info['commentaire']; ?><br>
  <?php echo $info['date_commentaire']; ?>
</p>

<?php
$req->closeCursor();
  ?>

  </body>
</html>
