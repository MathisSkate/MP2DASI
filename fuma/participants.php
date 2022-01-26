<?php
include_once "includes/header.php";
?>

<main class="col-lg-10 pageAdminUser ">
    <?php include_once 'includes/title.php' ?>
    <section class="content-container row ">
       
            <h2 class="ml-3"><?php echo $q[$_SESSION['lang']]['participants']['a']?></h2>
        
        <div class="col-lg-12 options-container">

            <div class="search">
                <form method="GET" class="main-form-search">
                    <div class="input-container">
                        <input type="text" class="site-search" name="query" placeholder="Rechercher un participant">
                        <button disabled class="button-search-container">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <?php

                    $stmt2 = $bdd->prepare("SELECT count(*)    
                                                        FROM commune.utilisateur as tab1
                                                        JOIN commune.participer AS tab2
                                                        ON tab1.id_utilisateur = tab2.id_utilisateur
                                                        JOIN commune.projet AS tab3 
                                                        ON tab2.id_projet = tab3.id_projet
                                                        WHERE tab3.nom_projet = :projetgeneral ");
                    $stmt2->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
                    $stmt2->execute();
                    $valeur = $stmt2->fetchColumn();
                    $page = 0;

                    for ($i = 10; $i <= ($valeur+10) ; $i = $i+10){

                        $page = $page+1;

                        if(( $i % 10 ) == 0){
                            echo "<li class=\"page-item\"><a id=\"".($i-10)."\" class=\"pagePart page-link\" href=\"#\">".$page."</a></li>";
                        }
                    }?>
                </ul>
            </nav>


        </div>
        <div class="col-lg-12 "  >
            <div class="table-responsive">
            <table id="UsersParticipants" class="table  table-striped text-center " style="font-size:0.9em;"  >
                <thead >
                <tr>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['c']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['d']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['e']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['f']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['g']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['h']?></th>
                    <th scope="col"><?php echo $q[$_SESSION['lang']]['participants']['i']?></th>
                </tr>
                </thead>
                <tbody class="tbody-table-participants" >

                </tbody>
            </table>
            </div>

        </div>
        <div class="col-lg-12 options-container">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <?php

                    $stmt2 = $bdd->prepare("SELECT count(*)    
                                                        FROM commune.utilisateur as tab1
                                                        JOIN commune.participer AS tab2
                                                        ON tab1.id_utilisateur = tab2.id_utilisateur
                                                        JOIN commune.projet AS tab3 
                                                        ON tab2.id_projet = tab3.id_projet
                                                        WHERE tab3.nom_projet = :projetgeneral ");
                    $stmt2->bindParam(':projetgeneral', $nameprojetgeneral, PDO::PARAM_STR);
                    $stmt2->execute();
                    $valeur = $stmt2->fetchColumn();
                    $page = 0;

                    for ($i = 10; $i <= ($valeur+10) ; $i = $i+10){

                        $page = $page+1;

                        if(( $i % 10 ) == 0){
                            echo "<li class=\"page-item\"><a id=\"".($i-10)."\" class=\"pagePart page-link\" href=\"#\">".$page."</a></li>";
                        }
                    }?>
                </ul>
            </nav>
        </div>
    </section>
</main>
<?php
include_once "includes/footer.php";
?>


