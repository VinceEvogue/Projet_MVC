<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
// var_dump($_POST);
// echo '<br>';
// var_dump($_FILES);
?>
<div class="container my-4 p-4 border border-primary rounded w-75 mx-auto">
<h1 class="text-center pb-3 border-bottom border-secondary mx-5">Ajout Produit</h1>


    <form method="post" enctype="multipart/form-data" class="mx-5"> 
    <fieldset>
        <div class="form-group">
        <label for="name" class="form-label mt-1">Nom</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nom du produit" name="name" value="<?= $_POST['name'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['name'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
        <label for="category" class="form-label mt-4">Categorie</label>
        <select class="form-select" id="category" name="category">
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'Chaussures')? 'selected' : ''; ?>>Chaussures</option>
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'Pantalons')? 'selected' : ''; ?>>Pantalons</option>
        </select>
        </div>
        <div class="form-group">
        <label for="image" class="form-label mt-4">Image</label>
        <input class="form-control" type="file" id="image" name="image">
        <small class="text-danger"><?= $error['image'] ?? ""; ?></small>
        </div>
        <div class="form-group">
        <label for="description" class="form-label mt-4">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?= $_POST['description'] ?? ""; ?></textarea>
        </div>
        <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
        <div class="form-group">
        <label for="price" class="form-label mt-4">Prix</label>
        <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="<?= $_POST['price'] ?? ""; ?>">
        </div>
        <small class="text-danger"><?= $error['price'] ?? ""; ?></small>
        <button type="submit" class="my-3 col-12 btn btn-primary">Ajouter</button>
    </fieldset>
    </form>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>