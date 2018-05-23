<?php
    //inclusion du fichier
    require_once '../src/App/Entity/Article.php';
    use App\Entity\Article;


    /************** Article *****************/
    $prix = 100;
    $remise = 15;
    $article = new Article();

    //Méthodes chaînées
    
    $article->setNom('Coca Cola')
            ->generateReference();  

    $article->setDescription('Boisson sucré fabriquer par START Madagascar');  
    $article->setPrix($prix);

    Article::setRemise($remise);
    $article->getPrixDiminuer();

    echo Article::REMISE_MAX;
    
    var_dump($article);

    //objet de reference
    $articleRef = $article;

    var_dump($articleRef);


    //destruction de l'objet
    unset($article);
    /********** dans une classe Article::$var = self::$var *************/
    /********** self::$var fait refence au nom du classe **********/
    /********** $this est inaccessible dans une methode static *************/
    /********** un objet est de type référence *******/