<?php include(VIEWS . '_partials/header.php'); ?>




<h1 class="text-center">Gestion des produits</h1>

<div class="container my-3">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($produits as $produit): ?>


<div class="modal fade" role="dialogue" tabindex="-1"  aria-hidden= "true" id="modalSupprimer">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer Produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Etes-vous sur de vouloir supprimer ce produit ???</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="<?= BASE . 'produit/supprimer?id=' . $produit['id_product']; ?>">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>




            <tr>
                <td><?= $produit['id_product']; ?></td>
                <td><?= $produit['name']; ?></td>
                <td><?= $produit['category']; ?></td>
                <td><img src="<?= UPLOAD . $produit['image']; ?>" alt="" width="50px"></td>
                <td><?= $produit['price']; ?>€</td>
                <td>
                    <a href="<?= BASE . 'produit/vue?id=' . $produit['id_product']; ?>" class="text-info"><i class="bi bi-eyeglasses"></i></a>

                    <a href="<?= BASE . 'produit/modifier?id=' . $produit['id_product'] ; ?>" class="text-primary mx-3"><i class="bi bi-pencil-square"></i></a>

                    <a data-bs-toggle="modal" data-bs-target="#modalSupprimer" href="" class="text-danger"><i class="bi bi-trash3"></i></a>

                </td>
            </tr>

        <?php endforeach; ?> 
        </tbody>
    </table>
</div>


<?php include(VIEWS . '_partials/footer.php'); ?>