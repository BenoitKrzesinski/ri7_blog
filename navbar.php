

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?admin=true">Gestion des articles</a>
                    </li>

                    <!-- Le dropdown Catégories -->
                    <?php
                    include_once("fonctionsPHP.php") ;
                    $connex = connexionDB('bdd_blog') ;
                    if ($connex) 
                    {
                        mysqli_set_charset($connex, 'utf8');    // Ici le code pour mettre ma base de données en UTF8
                            // Récupérer les données de Catégories
                        $requeteCategorie = "SELECT * FROM categorie";
                        $resultCategorie = mysqli_query($connex,$requeteCategorie);
                        if (!$resultCategorie) 
                            {
                                echo "<script type=text/javascript>" ;
                                echo 'alert("Impossible d\'afficher les catégories")</script>' ;
                            }
                        else 
                            {
                                echo '<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Catégories
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">' ;
                                while ($categories = mysqli_fetch_array($resultCategorie))
                                {
                                    $link_categorie = 'index.php?list_categories=true&categorie='.$categories[0];
                                    echo '<li><a class="dropdown-item" href="'.$link_categorie.'">'.$categories[1].'</a></li>' ;
                                }
                                echo "</ul>
                                    </li>" ;
                            }
                            mysqli_close($connex) ;
                    }
                    ?>

                    <!-- Le dropdown Keywords -->
                    <?php
                    include_once("fonctionsPHP.php") ;
                    $connex = connexionDB('bdd_blog') ;
                    if ($connex) 
                    {
                        mysqli_set_charset($connex, 'utf8');    // Ici le code pour mettre ma base de données en UTF8
                            // Récupérer les données de Keywords
                        $requeteKeywords = "SELECT * FROM keywords";
                        $resultKeywords = mysqli_query($connex,$requeteKeywords);
                        if (!$resultKeywords) 
                            {
                                echo "<script type=text/javascript>" ;
                                echo "alert('Impossible d afficher les mots-clés')</script>" ;
                            }
                        else 
                            {
                                echo '<li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Mots-clés
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">' ;
                                while ($keywords = mysqli_fetch_array($resultKeywords))
                                {
                                    $link_keywords = 'index.php?list_keywords=true&keywords='.$keywords[0];
                                    echo '<li><a class="dropdown-item" href="'.$link_keywords.'">'.$keywords[1].'</a></li>' ;
                                }
                                echo "</ul>
                                    </li>" ;
                            }
                            mysqli_close($connex) ;
                    }
                    ?>

                </ul>
                <form class="d-flex" id="search_form" action="index.php?search=true" method="GET">
                    <input type="hidden" name="search" value="true"> <!-- Remplace l'action au-dessus (?search=true) car les paramètres dans l'URL sont automatiquement écrasés au moment du Submit -->
                    <input class="form-control me-2" type="search" id="search_input" name="search_input" placeholder="Rechercher">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>

            </div>
        </div>
    </nav>

