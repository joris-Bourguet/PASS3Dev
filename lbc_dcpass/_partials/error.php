<section id="error" class="container">
  <?php
  if (isset($_SESSION['message'])):
    ?>
    <div class="errorDiv alert  <?php if ($_SESSION['erreur']) {
      echo "alert-danger";
    } else {
      echo "alert-success";
    } ?>">
    <?= $_SESSION['message'] ?>
    <span class="badge badge-light close-error" id="js-close-error"><i class="fas fa-times"></i></span>
  </div>

  <?php
  unset($_SESSION['message']);
  unset($_SESSION['status']);
endif;
?>
</section>
