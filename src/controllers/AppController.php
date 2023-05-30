<?php

class AppController
{


    public static function index()
    {
        $produits = Product::findAll();
        include(VIEWS . 'app/index.php');
    }

    public static function ajoutProduit()
    {
        //*on vérifie que l'utilisateur a cliqué sur le bouton submit.
        if(!empty($_POST))
        {
            //*on créé un tableau vide qui va servir a gerer nos erreurs
            $error = [];
            //*on vérifie que l'input "name" est vide et dans se cas on ajoute un message d'erreur dans le tableau $error (indice 'name')
            if(empty($_POST["name"]))
            {
                $error['name'] = "le champs name est obligatoire";
            }
            if(empty($_POST['description']))
            {
                $error['description'] = "le champs description est obligatoire";
            }
            if(empty($_POST['price']))
            {
                $error['price'] = "le champs price est obligatoire";
            }
            //*on vérifie l'input type file
            if(empty($_FILES['image']['name']))
            {
                $error['image'] = "le champs image est obligatoire";
            }
            //* s'il n'y a pas d'erreur on peut traiter l'image et envoyer les données en bdd
            if(!$error)
            {   
            //*on vérifie la taille du fichier et si ce fichier est une image
               if($_FILES['image']['size'] < 3000000 && ($_FILES['image']['type'] == 'image/jpeg'|| $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/gif' || $_FILES['image']['type'] == 'image/webp' ))
               {
                //*on créer un nouveau name pour l'image (unique)
                  $nameImage = date('dmYHis') . $_FILES['image']['name'];

                //   die(var_dump($_FILES['image']['tmp_name'], PUBLIC_FOLDER . DIRECTORY_SEPARATOR . "upload". DIRECTORY_SEPARATOR . $nameImage));
                //*on a copier le fichier stocker de manière temporaire dans le dossier upload avec son nouveau name
                  copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . DIRECTORY_SEPARATOR . "upload". DIRECTORY_SEPARATOR . $nameImage);
                
                 //*créer un tableau de donnée avec les données a envoyer en BDD 
                  $data = [
                    'name' => $_POST['name'],
                    'category' => $_POST['category'],
                    'image' => $nameImage,
                    'price' => $_POST['price'],
                    'description' => $_POST['description']
                  ];
                 //*on utilise la méthode ajouter (static) de la class Produit afin d'envoyer mes données en BDD 
                 Product::ajouter($data);
                 
                 $_SESSION['messages']['success'][] = 'Le produit a bien été ajouté';
                 header('location:' . BASE);
                 exit(); 
               }
            }

        }
         
        include(VIEWS . 'app/ajoutProduit.php' );
    }

    public static function gestionProduit()
    {
        $produits = Product::findAll();
        include(VIEWS . 'app/gestionProduit.php');
    }

    public static function modifierProduit()
    {   
        //*ici on vérifier que notre GET['id'] n'est pas vide afin de récupérer notre produit
        if(!empty($_GET['id'])){
            //*je récupère mon produit grâce a son id
            $produit = Product::findById(['id_product' => $_GET['id']]);
        }
        else{
            header('location:' . BASE . 'produit/gestion');
            exit();
        }
        //*si l'utilisateur a cliqué sur modifier alors je rentre dans les accolades
        if(!empty($_POST))
        {
            //*création d'un tableau d'erreur vide
            $error = [];
            foreach($_POST as $indice => $valeur)
            {
                if(empty($valeur))
                {
                    $error[$indice] = "le champs $indice est obligatoire";
                }
            }
            //* s'il y a pas d'erreur on fait notre traitement
                if(!$error)
                {
                    //*on vérifie qu'il y a une nouvelle image dans l'input type file avec le bon poid et le bon type
                    if((!empty($_FILES['image']['name'])) && $_FILES['image']['size'] < 3000000 && ($_FILES['image']['type'] == 'image/jpeg'|| $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/gif' || $_FILES['image']['type'] == 'image/webp' ))
                    {
                        //*on créé un nouveau name d'image
                        $nameImage = date("dmYHis") . $_FILES['image']['name'];
                        
                        //*on supprime l'ancienne image 
                        unlink(PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $_POST['ancienneImg']);

                        //*on stocke la nouvelle image
                        copy($_FILES['image']['tmp_name'], PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $nameImage);
                    }
                    //*s'il n'y a pas de nouvelle
                    else
                    {   //* on stocke dans la variable $nameImage le name de l'ancienne image
                        $nameImage = $_POST['ancienneImg'];
                    }
                    //*on procède à la modification en BDD de notre produit
                    Product::update([
                        'name' => $_POST['name'],
                        'category' => $_POST['category'],
                        'image' => $nameImage,
                        'price' => $_POST['price'],
                        'description' => $_POST['description'],
                        'id_product' => $_GET['id']
                    ]);
                    $_SESSION['messages']['success'][] = 'Le produit a bien été modifié';

                    header('location:' . BASE . 'produit/gestion');
                    exit();
                }
            

        }
        include(VIEWS . 'app/modifierProduit.php');
    }

    public static function supprimerProduit()
    {
        if(!empty($_GET['id']))
        {
            Product::delete([
                'id_product' => $_GET['id']
            ]);
            $_SESSION['messages']['success'][] = 'Le produit a bien été supprimé';
        }

        header('location:' . BASE . 'produit/gestion');
        exit;
    }

    public static function vueProduit()
    {
        if(isset($_GET['id']))
        {   
            //*techniquement $_GET['id'] est un string si on veut être rigoureux on convertit se string en integer dans notre tableau car l'id est un int
            // echo gettype($_GET['id']);
            $produit = Product::findById([
                'id_product' => intval($_GET['id'])
            ]);
        }
        include(VIEWS . 'app/vueProduit.php');
    }
}
