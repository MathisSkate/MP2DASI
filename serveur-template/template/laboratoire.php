<?php
include_once "includes/header.php";

$req = $bdd->prepare('SELECT tab1.id_laboratoire, tab1.nom_laboratoire, tab1.abreviation_laboratoire, tab1.img_laboratoire, tab1.site_laboratoire, tab1.description_laboratoire
                                  FROM commune.laboratoire AS tab1
                                  ORDER BY `id_laboratoire` DESC');
$req->execute();
$donnees = $req;

?>
    <main class="col-lg-10 pageLabo">
        <?php include_once 'includes/title.php' ?>
        <section class="content-container col-lg-12 row">
            <div class="col-lg-12">
                <h2><?php echo $q[$_SESSION['lang']]['laboratoire']['a']?>&nbsp;</h2>
            </div>
        <?php
        while ($reqLab = $donnees->fetch()){
            echo"
            <div class=\"card col-lg-12\">
              <div class=\"card-header\">
                <h5>".$reqLab['nom_laboratoire']." (".$reqLab['abreviation_laboratoire'].")</h5>
              </div>
              <div class=\"card-body\">
                <div class=\"card-title\">
                    <img style='    width: 12.5rem;' src=\"../media_commun/laboratoire/".$reqLab['img_laboratoire']."\">
                </div>
                ".
                (($reqLab['description_laboratoire']) ? "<div class='desclabo-container'><p class=\"col-lg-12 presLabo\">".$reqLab['description_laboratoire']."</p></div>" : "")
                ."          
              </div>
              <div class=\"card-footer text-center\">
                <a href=\"".$reqLab['site_laboratoire']."\">".$reqLab['site_laboratoire']."</a>
              </div>
            </div>
            ";
        }
        ?>
        </section>
    </main>
<?php
include_once "includes/footer.php";
?>
