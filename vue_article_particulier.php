

    <?php

    include_once("fonctionsPHP.php") ;

    $connex = connexionDB('bdd_blog') ;

    if ($connex)
    {

        mysqli_set_charset($connex, 'utf8') ;        // Ici le code pour mettre ma base de données en UTF8

        $code = (int)$_GET['code'] ;                // On récupère l'Id_Article envoyé par la page modif_articles.php via le click sur $mod
        $requeteModif = "SELECT * FROM article WHERE Id_Article = ".$code.";" ;         // Requête de récupération de toutes les données de l'article = celui envoyé par le code de la page modif_articles.php
        $resultModif = mysqli_query($connex, $requeteModif) ;

        if (!$resultModif)
        {

            echo "<script type='text/javascript'>"; 
            echo "alert('Impossible de récupérer cet article');";
            echo "</script>"; 

        }

        else
        {
            while ($ModArticle = mysqli_fetch_array($resultModif)) {
                $IdArticle = $ModArticle[0] ;
                $Titre = $ModArticle[1] ;
                $Auteur = $ModArticle[2] ;
                $ContenuTexte = $ModArticle[3] ;
                $ContenuImage = $ModArticle[4] ;
                $Date = $ModArticle[5] ;

                $mod = "index.php?mod=true&code=".$IdArticle ;      // Transférer cet Id_Article vers le lien de modification (mod=true) sur la page index.php au click sur l'élément $mod
                $supp = "supp_article.php?code=".$IdArticle ;       // Transférer cet Id_Article vers la page supp_article.php au click sur l'élément $supp
            }

        }

        ?>

    <div class='card-group'>
        <div class="card">
            <img src="<?php echo $ContenuImage ; ?>" class="card-img-top" alt="">
            <div class="card-body">
                <h3 class="card-title text-center"><?php echo $Titre ; ?></h3>
                <p class="card-text text-center"><?php echo $ContenuTexte ; ?></p>
                <div class="card-footer">
                    <p class="card-text text-center">Ecrit par : <?php echo $Auteur ; ?></p>
                    <p class="card-text text-center"><small class="text-muted">Date de création : <?php echo $Date ; ?></small></p>
                </div>
                <div class="text-center card-footer-admin">
                    <a href="<?= $mod ?>"><div>Modifier l'article <i class="fas fa-edit"></i></div></a>
                    <a href="<?= $supp ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet article ?'));"><div>Supprimer l'article <i class="fas fa-trash-alt"></i></div></a>
                </div>
            </div>
        </div>
        <a href="index.php" id="cancel-vue-article">Retour</a>
    </div>

    <?php

    }

        mysqli_close($connex);


    ?>

