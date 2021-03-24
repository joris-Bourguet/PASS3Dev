<?php
require_once '_partials/header.php';

?>

<section class="index container py-2 pt-5">
  <div class="row">
    <div class="col-12">
      <h1>Connexion</h1>
    </div>
  </div>
</section>
<?php
require_once '_partials/error.php';
?>
<section id="loginForm" class="container py-2">
  <form method="post" action="assets/php/auth.php">
    <div class="form-group">
      <label for="email">Adresse mail</label>
      <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">Veuillez entrer votre adresse email ou votre
        pseudo.</small>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="keepLogin">
        <label class="form-check-label" for="keepLogin">Rester connecté !</label>
      </div>
      <button type="submit" class="btn btn-primary" value="connect" name="btn-connect">Connexion</button>
    </form>
  </section>
  <?php
  require_once '_partials/footer.php';
