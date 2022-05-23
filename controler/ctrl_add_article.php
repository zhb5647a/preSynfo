<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';
    include './view/view_add_article.php';
    //variable message
   
    $art = new Articles(null, null);
    //test si le bouton ajouté est cliqué
    if(isset($_POST['add'])){
        //test si les champs sont rempli
        if(isset($_POST['nom_art']) AND isset($_POST['content_art']) AND 
        $_POST['nom_art'] != "" AND $_POST['content_art'] !=""){
            //instancier un nouvel objet Article (appel au constructeur)
            $article = new Articles($_POST['nom_art'], $_POST['content_art']);
            //appel à la méthode addArticleV2 de la classe Article
            $article->addArticle($bdd);
            //utiliser le getter pour afficher le nom
            echo ''.$_POST['nom_art'].' à été ajouté';
        }
        //si vide
        else{
            echo 'Veuillez remplir les champs du formulaire';
        }
    }    
  
?>