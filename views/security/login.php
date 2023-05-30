<?php include(VIEWS . '_partials/header.php'); ?>

<form action="" method="post" class="w-50 mx-auto border border-primary rounded mt-5 p-5">
    <h1 class="text-center">Connexion</h1>
    <div class="form-group">
            <label for="email" class="form-label mt-4">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $_POST['email'] ?? "" ; ?>">
            <small class="text-danger"><?= $error['email'] ?? "" ; ?></small>
        </div>
        <div class="form-group">
            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password">
            <small class="text-danger"><?= $error['password'] ?? "" ; ?></small>
        </div>
        <button class="btn btn-primary my-4 w-100" type="submit">Se connecter</button>
</form>
<?php include(VIEWS . '_partials/footer.php'); ?>