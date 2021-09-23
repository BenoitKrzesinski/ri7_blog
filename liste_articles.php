
    <div>

        <div>

            <?php

            include_once("fonctionsPHP.php") ;

            $connex = connexionDB('bdd_blog') ;

            if ($connex) 
            {

                mysqli_set_charset($connex, 'utf8');                     // Ici le code pour mettre ma base de données en UTF8

        
                    // Récupérer les données de Article
                $requeteArticle = "SELECT * FROM article";
                $resultArticle = mysqli_query($connex,$requeteArticle);

                if (!$resultArticle) 
                    {
                        echo "<script type=text/javascript>";
                        echo 'alert("Impossible d\'afficher les articles")</script>';
                    }

                else 
                    {
                        echo "<div class='card-group'>";
                        while ($articles = mysqli_fetch_array($resultArticle))
                        {
                            $code = $articles[0] ;
                            $vue = "index.php?vue=true&code=".$code ;
                            echo    '<div class="card">
                                        <a href="'.$vue.'"><img src="'.$articles[4].'" class="card-img-top" alt=""></a>
                                        <div class="card-body">
                                            <h3 class="card-title text-center">'.$articles[1].'</h3>
                                            <p class="card-text text-center">'.$articles[3].'</p>
                                            <div class="card-footer">
                                                <p class="card-text text-center">Ecrit par : '.$articles[2].'</p>
                                                <p class="card-text text-center"><small class="text-muted">Date de création :'.$articles[5].'</small></p>
                                            </div>
                                        </div>
                                    </div>';
                        }
                        echo "</div>" ;
                    }

                    mysqli_close($connex) ;
            }


            ?>

        </div>

    </div>