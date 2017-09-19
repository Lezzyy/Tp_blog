<?php
    include('header.php');
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
<div class="container">
  <div class="row">
    <div class="title">
<h1 class="text-center"><?php echo $donnees['titre']; ?></h1>
</div>
<p class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
  <?php echo $donnees['contenu']; ?><br>
  <?php echo $donnees['date_creation']; ?>
</p>
</div>
</div>

<?php
$req->closeCursor();
  ?>

<?php

// $req = $bdd->prepare('SELECT comments.auteur FROM comments INNER JOIN articles ON articles.id = comments.id_articles');


$req = $bdd->prepare('SELECT * FROM comments WHERE comments.id_articles=?');
$req->execute(array($article));

while ($info = $req->fetch()){

?>
<div class="container-fluid">
      <div class="title">
<h1>Commentaires :</h1>
</div>
</div>

<div class="container">
<p class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
  <?php echo $info['auteur']." : "; ?><br>
  <?php echo $info['commentaire']; ?><br>
  <?php echo $info['date_commentaire']; ?>
</div>
</p>


<?php
}
$req->closeCursor();
  ?>

  </body>
</html>
