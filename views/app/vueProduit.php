
<?php include(VIEWS . '_partials/header.php'); ?>

<div class="container">
    <h1 class="text-center text-white bg-primary mt-3 py-3 rounded"><?= $produit['name']; ?></h1>
    <div class="card text-white bg-primary mb-3">
    <div class="card-header text-center" style="height:80vh;"><img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="rounded-top" style="object-fit:cover;width:100%;height:100%;"></div>
    <div class="card-body">
        <h4 class="card-title">Categorie : <?= $produit["category"]; ?></h4>
        <h4 class="card-title">Description : </h4>
        <p class="card-text"><?= $produit['description']; ?></p>
        <h5 class="text-end">Prix : <?= $produit['price']; ?>€</h5>
    </div>
    </div>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>