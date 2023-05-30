<?php include(VIEWS . '_partials/header.php'); ?>
<div class="container">
    <h1 class="text-center my-5">Bienvenue sur mon site de vente</h1>
    <hr>
</div>
<?php 
// echo '<pre>';
//     print_r($produits);
// echo '</pre>';
// if(isset($_SESSION['user']))
// {
//   var_dump($_SESSION['user']);
  
// }

?>
<div class="container mt-5">
    <div class="row justify-content-evenly">
    <?php foreach($produits as $produit): ?>
    <div class="col-md-4">
    <div class="card text-white bg-secondary h-100">
        <div style="height:300px;">
            <img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="rounded-top" style="object-fit:cover;width:100%;height:100%;">
        </div>
        <div class="card-header"><?= $produit['category']; ?></div>
        <div class="card-body">
            <h4 class="card-title"><?= $produit['name']; ?></h4>
            <p class="card-text text-end h3"><?= $produit['price']; ?>€</p>
            <div class="text-center my-2">
                <a href="<?= BASE . 'produit/vue?id=' . $produit['id_product']; ?>" class="btn btn-primary">Détails</a>
            </div>
        </div>
    </div> 
    </div>
    <?php endforeach; ?>

    </div>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>
