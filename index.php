<?php

    session_start();
    
        ?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="custom.css" rel="stylesheet">

</head>

<body id="home">

    <div id="nav-to-top"><a href="#home"><i class="fas fa-arrow-up"></i></a></div>

    <?php include_once('navbar.php') ?>

    <div id="home-title" class="text-center">
    
        <h1>Bienvenue sur le Blog de l'armée de l'air</h1>

        <h3>Vous pourrez y trouver toutes les dernières informations sur les avions de combat</h3>

    </div>

    <section id="include-page">

        <?php 

            if (isset($_GET['admin']) && $_GET['admin'] == true)
            {
                include_once('modif_articles.php');
            }
            else if (isset($_GET['create']) && $_GET['create'] == true)
            {
                include_once('creation_article.php');
            }
            else if (isset($_GET['mod']) && $_GET['mod'] == true)
            {
                include_once('modif_article_particulier.php');
            }
            else if (isset($_GET['list_categories']) && $_GET['list_categories'] == true)
            {
                include_once('list_articles_categories.php');
            }
            else if (isset($_GET['list_keywords']) && $_GET['list_keywords'] == true)
            {
                include_once('list_articles_keywords.php');
            }
            else if (isset($_GET['vue']) && $_GET['vue'] == true)
            {
                include_once('vue_article_particulier.php');
            }
            else if (isset($_GET['search']) && $_GET['search'] == true)
            {
                include_once('requete_search.php');
            }
            else 
            {
                include_once('liste_articles.php'); 
            }

            ?>

    </section>

</body>
</html>