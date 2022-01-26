<?php
include_once "functions/config.php";

/*Pour afficher les actions*/
$req = $bdd->prepare('SELECT id_action from ' . $nameprojetgeneral . '.action');
$req->execute();
$reqAct = $req->fetchAll();

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

    <section class="col-lg-3">
        <section class="row">
            <h3 class="col-lg-12"><?php echo $q[$_SESSION['lang']]['footer']['k']?> </h3>
        </section>
        <section class="row">
            <div class="col-lg-6">
                <a href="https://www.normandie.fr/"><img border="0" class="img-thumbnail" alt="Logo"
                                                            src="media/image/logo/normandie.jpg"></a>
            </div>
            <div class="col-lg-6">
                <a href="http://www.europe-en-france.gouv.fr/L-Europe-s-engage"><img border="0" class="img-thumbnail" alt="Logo"
                                                          src="media/image/logo/UE_feder.jpg"></a>
            </div>
        </section>
    </section>
    <section class="col-lg-3">
        <section class="row">
            <h3 class="col-lg-12"><?php echo $q[$_SESSION['lang']]['footer']['p']?> </h3>
        </section>
        <section class="row">
            <div class="col-lg-6">
                <a href="https://www.univ-lehavre.fr/"><img border="0" class="img-thumbnail" alt="Logo"
                                                            src="media/image/logo/universite_le_havre_logo.png"></a>
            </div>

        </section>
    </section>
    <section>
        <h3 class="col-lg-12">Développement: </h3>
        <div>
            <ul id="listedevs">
                <li class="nav-item">
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

                <div class="input-group mb-3">
                    <select class="custom-select language-select" name="countries" id="countries" id="input-language">
                        <option <?php if($_SESSION['lang'] == "fr") echo 'selected'; ?> value='fr' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="France">Français</option>
                        <option <?php if($_SESSION['lang'] == "en") echo 'selected'; ?> value='en' data-image="media/image/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="Anglais">Anglais</option>
                    </select>
                </div>
            </ul>
        </div>
    </section>
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
