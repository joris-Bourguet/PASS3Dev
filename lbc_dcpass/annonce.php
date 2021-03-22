<?php
require_once '_partials/header.php';
require_once 'function.php';

// Verifie si l'id est bien récupéré et est numéric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // On verifie si l'id est bien associé à une annonce existante
    if (annonceExiste($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        die("annonce introuvable");
    }
} else {
    header('Location: 404.php');
}
$db      = getDatabaseConnection();
$req     = $db->query('SELECT * FROM annonce WHERE id='.$id);
$annonce = $req->fetch(PDO::FETCH_ASSOC);
function annonceExiste($id)
{
    $db       = getDatabaseConnection();
    $req      = $db->query("SELECT * FROM annonce WHERE id=".$id);
    $annonces = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($annonces as $annonce) {
        if ($id == $annonce["id"]) {
            return true;
        } else {
            return false;
        }
    }
}

?>

    <section class="index container py-2 pt-5">
        <div class="row">
            <div class="col-12">
                <h1><?= $annonce['title'] ?></h1>
            </div>
        </div>
    </section>
    <section class="container py-2">
        <div class="row">
            <div class="col">
                <img class="img-fluid" src="https://dummyimage.com/1920x1080/000/fff&text=Image+annonce"
                     alt="image annonce">
            </div>
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div>
                    <h2>Description</h2>
                    <p><?= $annonce['description'] ?></p>
                </div>
                <div>
                    <h2>Prix</h2>
                    <p><?= $annonce['price'] ?>€</p>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="delete-tab" data-toggle="tab" href="#delete" role="tab"
                           aria-controls="delete" aria-selected="true">Supprimer</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="update-tab" data-toggle="tab" href="#update" role="tab"
                           aria-controls="update" aria-selected="false">Modifier</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                        <form action="assets/php/traitement.php" method="post" class="py-5">
                            <input type="hidden" name="idAnnonce" value="<?= $_GET['id'] ?>">
                            <button type="submit" class="btn btn-primary" name="deleteAnnonce"
                                    value="deleteThis" id="delete"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce');">
                                Supprimer l'annonce
                            </button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once '_partials/footer.php';

