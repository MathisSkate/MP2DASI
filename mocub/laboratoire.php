<?php
include_once "includes/header.php";
$requete = "SELECT tab.id_projet,tab.nom_projet FROM commune.projet AS tab WHERE tab.nom_projet='$nameprojetgeneral'";
$req = $bdd->prepare($requete);
$req->execute();
$ligne = $req->fetch();
$idprojet=$ligne[0];

$requete2 = "SELECT tab1.id_laboratoire, tab1.nom_laboratoire, tab1.abreviation_laboratoire, tab1.img_laboratoire, tab1.site_laboratoire, tab1.description_laboratoire 
             FROM commune.laboratoire AS tab1,commune.appartenir as tab2 WHERE tab2.id_projet=$idprojet and tab2.id_laboratoire=tab1.id_laboratoire order by tab1.nom_laboratoire";
$req2 = $bdd->prepare($requete2);
$req2->execute();
$donnees = $req2;

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