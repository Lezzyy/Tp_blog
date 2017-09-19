  <?php
    include('header.php');

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'gj7b!17LA');
    } catch (Exception $e) {
        die('Erreur :'. $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM articles ORDER BY id DESC  LIMIT 0, 5');
//     $rep = $reponse->fetchAll();
// foreach ($rep as $key => $donnees) {
//   # code...
// }
    while ($donnees = $reponse->fetch()) {
        ?>
    <div class="container">
      <div class="row">
        <div class="title">
    <h1 class="text-center"><?php echo $donnees['titre']; ?></h1>
  </div>
    <p class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
      <?php echo $donnees['date_creation']; ?><br>
      <?php echo $donnees['contenu']; ?><br>
      <a href="comments.php?contents=<?php echo $donnees['id']?>">Comments</a>
    </p>
  </div>
</div>


<?php
    }

    $reponse->closeCursor();
    ?>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
