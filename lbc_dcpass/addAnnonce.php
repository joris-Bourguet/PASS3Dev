<?php

require_once '_partials/header.php';

?>

<section class="index container py-2 pt-5">
  <div class="row">
    <div class="col-12">
      <h1>Ajouter une annonce</h1>
    </div>
  </div>
</section>
<?php require_once '_partials/error.php'; ?>
<section id="formAdd" class="py-2">
  <form method="POST" action="assets/php/traitement.php">
    <div class="container">
      <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
      </div>


      <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" class="form-control" name="price" id="price">
      </div>


      <div class="row form-group mx-0">
        <div class="col pl-0">
          <label for="category">Catégorie</label>
          <select name="category" class="form-control" id="category">
            <?php
            require_once 'function.php';
            $db         = getDatabaseConnection();
            $req        = $db->query('SELECT * FROM categorie');
            $categories = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $category) :
              ?>
              <option value="<?= $category['id'] ?>"><?= $category["libelle"] ?></option>
              <?php

            endforeach;

            ?>
          </select>
        </div>
        <div class="col pr-0">
          <label for="category">Utilisateur</label>
          <select name="user" class="form-control" id="user">
            <?php
            $req   = $db->query('SELECT * FROM user');
            $users = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user) :
              ?>
              <option value="<?= $user['id'] ?>"><?= $user["pseudo"] ?></option>
              <?php

            endforeach;

            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2 d-block w-100" name="saveAnnonce"
        value="addAnnonce">Ajouter l'annonce
      </button>
    </div>
  </form>
</section>


<?php

require_once '_partials/footer.php';
