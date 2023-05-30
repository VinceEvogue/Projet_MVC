
<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
// echo '<pre>';
//     print_r($_POST);
// echo '</pre>';

?>
<h1 class="text-center">Inscription</h1>

<div class="container">
    <form action="" method="post" class="row">
        <div class="form-group col-md-6">
            <label for="f_name" class="form-label mt-4">Prénom</label>
            <input type="text" class="form-control" name="f_name" id="f_name" value="<?= $_POST['f_name'] ?? "" ; ?>">
            <small class="text-danger"><?= $error['f_name'] ?? "" ; ?></small>
        </div>
        <div class="form-group col-md-6">
            <label for="l_name" class="form-label mt-4">Nom</label>
            <input type="text" class="form-control" name="l_name" id="l_name" value="<?= $_POST['l_name'] ?? "" ; ?>">
            <small class="text-danger"><?= $error['l_name'] ?? "" ; ?></small>
        </div>
        <div class="form-group col-md-6">
            <label for="pseudo" class="form-label mt-4">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $_POST['pseudo'] ?? "" ; ?>">
            <small class="text-danger"><?= $error['pseudo'] ?? "" ; ?></small>
        </div>
        <div class="form-group col-md-6">
            <label for="email" class="form-label mt-4">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $_POST['email'] ?? "" ; ?>">
            <small class="text-danger"><?= $error['email'] ?? "" ; ?></small>
        </div>
        <div class="form-group col-12">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password">
            <small class="text-danger"><?= $error['password'] ?? "" ; ?></small>
        </div>
        <div class="form-group col-12">
            <label for="checkPwd" class="form-label mt-4">Vérifiez le mot de passe</label>
            <input type="password" class="form-control" name="checkPwd" id="checkPwd">
            <small class="text-danger"><?= $error['checkPwd'] ?? "" ; ?></small>
        </div>
        <button type="submit" class="btn btn-primary mt-5 col-12">S'inscrire</button>
    </form>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>