<?php
include_once "functions/config.php";

/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

//compter le nombres d'actualités
$nbactualites = $bdd -> prepare(" select * from fuma.actualite;  ");
$nbactualites -> execute();
$countActualites = $nbactualites -> rowCount();

//compter le nombre de publications
$nbPublications = $bdd -> prepare(" select * from fuma.publication; ");
$nbPublications -> execute();
$countPublications = $nbPublications -> rowCount();

//compter le nombres de theses
$nbTheses = $bdd -> prepare("select*from fuma.these");
$nbTheses -> execute();
$countTheses = $nbTheses -> rowCount();

?>

<footer class="offset-3 row">

                        <ul class="dropdown-menu">
                            <?php
                            for ($i = 0; $i < sizeof($reqAct); $i++) {
                                echo "<li class=\"dropdown-item\">
                                         <a class=\"nav-link\" href=\"action.php?action=" . $reqAct[$i]['id_action'] . "\">" . $q[$_SESSION['lang']]['footer']['r'] . " " . $reqAct[$i]['id_action'] . "</a>
                                     </li>";
                            }
                            ?>
                        </ul>
<div class="row">
<?php 
/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action, numero_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

?>

<section class="col-xl-2 mr-5 navbar-nav flex-column"style="margin-left:-70px; line-height: 2em;" >
<h3 class=" my-3 text-white" style="margin-left:25px;">SiteMap</h3>
<ul style="list-style:none;font-size:1.1em; color:black;" class="navbar-nav flex-column navbar nav-full collapse" id="navbarNav">
<li ><a class="text-white " href="index.php"><?php echo $q[$_SESSION['lang']]['header']['b']?></a></li>
<li><a class="text-white"href="participants.php"><?php echo $q[$_SESSION['lang']]['header']['t']?></a></li>
<li class=" nav-item tn-group dropdown">
                    <a href="actions.php"><?php echo $q[$_SESSION['lang']]['header']['c']?></a>
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" >
                        <span class="sr-only"><?php echo $q[$_SESSION['lang']]['header']['d']?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        for ($i = 0; $i < sizeof($reqAct); $i++) {
                            echo "<li class=\"dropdown-item\">
                            <a class=\"nav-link\" href=\"action.php?action=" . $reqAct[$i]['id_action'] . "\">"."". $q[$_SESSION['lang']]['header']['e'] ."". " ".$reqAct[$i]['numero_action']."</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </li>


 <!-- ne pas afficher actualités publications et théses si ils sont vides; mais les afficher si c un super admin -->
 <?php
                
                if(($countActualites ==! 0) || ($_SESSION['isSuperAdmin'] == 1)){
                    $actualites = $q[$_SESSION['lang']]['header']['g'];
                    echo "<li><a class='text-white' href='actualites.php'>$actualites</a></li>" ;       
                }

                if(($countPublications ==! 0) || ($_SESSION['isSuperAdmin'] == 1)){
                    $publications = $q[$_SESSION['lang']]['header']['h'];
                    echo "<li><a class='text-white' href='publications.php'>$publications</a></li>";
                }

                if(($countTheses ==! 0) || ($_SESSION['isSuperAdmin'] == 1)){
                    $theses = $q[$_SESSION['lang']]['header']['i'];
                    echo "<li><a class='text-white' href='theses.php'>$theses</a></li>";
                }
                
            
            ?>
<li><a class="text-white"href="laboratoire.php"><?php echo $q[$_SESSION['lang']]['header']['f']?></li>
<li><a class="text-white"href="contact.php"><?php echo $q[$_SESSION['lang']]['header']['j']?></a></li>

</ul>
</section>


    <section class="col-xl-3 col-12 col-md-4 col-sm-12 col-lg-3 my-3" >
        
            <h3 class="mb-3 text-light" style="font-size:1.5em; "><?php echo $q[$_SESSION['lang']]['footer']['k']?> </h3>
        
        <section class="row">
            <div class="col-xl-6 col-6 col-md-6 col-sm-6 col-lg-6" >
                <a href="https://www.normandie.fr/"><img border="0" style="width:90px;" class="img-thumbnail" alt="Logo"
                                                            src="media/image/logo/normandie.jpg"></a>
            </div>
            <div class="col-xl-6 col-6 col-md-6 col-sm-6 col-lg-6">
                <a href="http://www.europe-en-france.gouv.fr/L-Europe-s-engage"><img style="width:90px;" border="0" class="img-thumbnail" alt="Logo"
                                                          src="media/image/logo/UE_feder.jpg"></a>
            </div>
        </section>
    </section>

    <section class="col-xl-4 col-12 col-md-4 col-sm-12 col-lg-5  my-3">
        
            <h3 class="mb-3 text-light " style="font-size:1.4em; "><?php echo $q[$_SESSION['lang']]['footer']['p']?> </h3>
        
        <section class="row">

            
            <div class="col-xl-6 col-6 col-md-6 col-sm-6 col-lg-6 " style="margin-right:-20px;">
                <a href="https://www.univ-lehavre.fr/"><img border="0" class="img-thumbnail " alt="Logo université le havre" src="media/image/logo/universite_le_havre_logo.png"></a>
                <a href="https://www.univ-rouen.fr/"><img border="0" class="img-thumbnail" alt="Logo université rouen" src="media/image/logo/univ_rouen.png"></a>
                <a href="https://www.novalog.eu/"><img border="0" class="img-thumbnail" alt="Logo" src="media/image/logo/nova.png"></a>
                <a href="https://www.esigelec.fr/"><img border="0"  class="img-thumbnail" alt="Logo esigelec" src="media/image/logo/esi.png" ></a>
                
            </div>

            <div class="col-xl-6 col-6 col-md-6 col-sm-6 col-lg-6 my-1" style="margin-left:-20px;">
                <a href="https://www.em-normandie.com/fr"><img border="0" class="img-thumbnail" alt="Logo EM Normandie" src="media/image/logo/em.jpg"></a>
                <a href="https://www.idit.fr/"><img border="0" class="img-thumbnail" alt="Logo Institut du Droit International des Transport" src="media/image/logo/idit.png"></a>
                <a href="https://www.neoma-bs.fr/"><img border="0" class="img-thumbnail" alt="Logo NEOMA Buisness School" src="media/image/logo/neoma.png"></a>

            </div> 
            
            
            
        </section>
    </section>

    <section class="col-xl-3 col-12 col-md-4 col-sm-12 col-lg-4  my-3">
        <h3 class="mb-3 text-light mr-5" style="font-size:1.4em; ">Développé par :</h3>
        <div>
            <ul id="listedevs" class="text-left" style="color:white; list-style:none;font-size:0.933em;" >
               <li class="nav-item"  >
                    <?php echo $q[$_SESSION['lang']]['footer']['m-1']?>
                </li>
                <li class="nav-item">
                    <?php echo $q[$_SESSION['lang']]['footer']['m-2']?>
                </li>
                <li class="nav-item">
                    <?php echo $q[$_SESSION['lang']]['footer']['m-3']?>
                </li>
                <li class="nav-item">
                    <?php echo $q[$_SESSION['lang']]['footer']['m-4']?>
                </li>
                <li class="nav-item">Chaourar Imine</li>
                  
                <div class="input-group my-3">
                    <select class="custom-select language-select" name="countries" id="countries" id="input-language">
                        <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
                        <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
                    </select>
                </div>
            </ul>
        </div>
    </section>
    </div>
</footer>
</div>
<div class="search-modal">
    <div class="header-menu-full">
        <div class="left-container">
            <a href="index.php"><img class="img-brand" src="media/<?php echo $nameprojetgeneral ?>_logo.png" alt="Logo de la startup MACK"></a>
        </div>
        <div class="right-container">
            <div>
                <a class="close-container" href="#"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </div>
    <div class="main-form">
        <form action="search.php" method="get" class="main-form-search">
            <label for="site-search"><?php echo $q[$_SESSION['lang']]['footer']['o']?></label>
            <div class="input-container">
                <input type="text" id="site-search" name="query">
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Script BootStrap-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="js/import/jquery.dd.min.js"></script>
<script src="js/personal/main.js"></script>


<!-- Include external JS libs FROALA. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files FROALA. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.3/js/froala_editor.pkgd.min.js"></script>

<!-- Quill.Js-->
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Initialize the editor. -->
<script>
    $(function() {
        $('.froalaTextarea textarea').froalaEditor({
            toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html'],
            quickInsertTags: null,
            undo: true
        });
        $('.froalaUnRe textarea').froalaEditor({
            toolbarButtons: ['undo', '|', 'redo'],
            quickInsertTags: null,
            charCounterMax: 350,
            undo: true
        });
        $('#undo-1, #undo-2').find('i').removeAttr('class').addClass('fas fa-undo');
        $('#redo-1, #redo-2').find('i').removeAttr('class').addClass('fas fa-redo');

    });
</script>
</body>
</html>
