<?php
include '../Controller/OffreC.php'; // Assuming the path to your OffreC class

$offreC = new OffreC();
$types = $offreC->afficherTypesOffre();

if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_fin"]) &&
    isset($_POST["localisation"]) &&
    isset($_POST["type"]) &&
    isset($_POST["id"])
) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $localisation = $_POST["localisation"];
    $type = $_POST["type"];
    $id = $_POST["id"];

    $offre = new Offre($id, $nom, $description, $prix, $date_debut, $date_fin, $localisation, $type);
    $offreC->modifierOffre($offre);
    header("Location:try.php");
}
?>
<!DOCTYPE html>
<html lang="en">

                    <?php
                         $offre=$offreC->getOffreById($_POST['id']);
                    ?>
                        <form method="post" action="" >
                            <input name="id" value="<?= $offre['id'] ?>">

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $offre['nom'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="<?= $offre['description'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" id="prix" name="prix" value="<?= $offre['prix'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="date_debut">Date de début</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?= $offre['date_debut'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="date_fin">Date de fin</label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?= $offre['date_fin'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="localisation">Localisation</label>
                                <input type="text" class="form-control" id="localisation" name="localisation" value="<?= $offre['localisation'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type['id'] ?>" <?= ($type['id'] == $offre['type_id']) ? 'selected' : '' ?>>
                                            <?= $type['nom'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <a href="offres.php" class="btn btn-danger">Retour à la liste</a>
                        </form>
                    
        
</html>