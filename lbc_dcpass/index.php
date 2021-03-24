<?php
require_once '_partials/header.php';

?>
<section class="index container py-2 pt-5">
  <div class="row">
    <div class="col-12">
      <h1>Bonjour voici les annonces</h1>
    </div>
  </div>
</section>

<?php
require_once '_partials/error.php';
?>

<section class="annonce container py-2">
  <?php
  require_once 'function.php';
  $db       = getDatabaseConnection();
  $req      = $db->query('SELECT * FROM annonce');
  $annonces = $req->fetchAll();


  ?>

  <div class="row row-cols-1 row-cols-md-3">
    <?php
    foreach ($annonces as $annonce) {
      ?>
      <div class="col mb-4">
        <div class="card text-center">
          <div class="card-header">
            Annonce <?= $annonce["id"] ?>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= strip_tags($annonce["title"]) ?></h5>
            <p class="card-text description mb-0"><?= strip_tags($annonce["description"]) ?></p>
            <p class="card-text price"><?= strip_tags($annonce["price"])."€" ?></p>
            <a href="annonce.php?id=<?= $annonce['id'] ?>">
              <button type="button" class="btn btn-light">Voir plus</button>
            </a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</section>

<?php
require_once '_partials/footer.php';
