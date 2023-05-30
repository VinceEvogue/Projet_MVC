<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
// if(isset($produit)){
//      echo '<pre>';
//     var_dump($produit);
//     echo'</pre>';
// }
// echo '<pre>';
// var_dump($_POST);
// echo'</pre>';
   

?>
<div class="container my-4 p-4 border border-primary rounded w-75 mx-auto">
<h1 class="text-center pb-3 border-bottom border-secondary mx-5">Modifier Produit</h1>


    <form method="post" enctype="multipart/form-data" class="mx-5"> 
    <fieldset>
        <input type="hidden" value="<?= $produit['image'] ?? ""; ?>" name="ancienneImg">
        <div class="form-group">
        <label for="name" class="form-label mt-1">Nom</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="name du produit" name="name" value="<?= $produit['name'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['name'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
        <label for="category" class="form-label mt-4">Categorie</label>
        <select class="form-select" id="category" name="category">
            <option <?= (isset($produit['category']) && $produit['category'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
            <option <?= (isset($produit['category']) && $produit['category'] == 'Chaussures')? 'selected' : ''; ?>>Chaussures</option>
            <option <?= (isset($produit['category']) && $produit['category'] == 'Pantalons')? 'selected' : ''; ?>>Pantalons</option>
        </select>
        </div>
        <div class="form-group">

        <label for="image" class="form-label mt-4">Image</label>
        <input class="form-control" onchange="loadFile(event)" type="file" id="image" name="image">
        <small class="text-danger"><?= $error['ancienneImg'] ?? ""; ?></small>

        <img src="<?= UPLOAD . $produit['image']; ?>" width="300" alt="">

        <img id="photo" width="300" alt="">
        
        </div>
        <div class="form-group">
        <label for="description" class="form-label mt-4">Description</label>
        <textarea class="form-control" id="description" name="description" rows="8"><?= $produit['description'] ?? ""; ?></textarea>
        </div>
        <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
        <div class="form-group">
        <label for="price" class="form-label mt-4">Prix</label>
        <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="<?= $produit['price'] ?? ""; ?>">
        </div>
        <small class="text-danger"><?= $error['price'] ?? ""; ?></small>
        <button type="submit" class="mt-3 col-12 btn btn-primary">modifier</button>
    </fieldset>
    </form>
</div>

<script>
    let loadFile = function(event)
    {
        let image = document.getElementById('photo');

        image.src = URL.createObjectURL(event.target.files[0]);
    }

</script>
<?php include(VIEWS . '_partials/footer.php'); ?>