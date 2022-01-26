<?php
include_once "includes/header.php";

?>
<main class="col-lg-10">
    <?php include_once 'includes/title.php' ?>

    <section class="content-container col-lg-12 row">
        <div class="col-lg-12">
            <h2 style="text-align: center;">Plateforme de téléchargement de fichiers CSV</h2>
        </div>
        <div class="test col-lg-12">
            <nav id="explorateur-dossier">
                <!-- On rentre ici le dossier parent de notre exploration de fichier -->
                <?php
                echo selecteded();
                echo '<br/>';
                //echo explorateurFichier('AisData');
                ?>
            </nav>
        </div>

        <?php

        /*fonction qui permet d'afficher les fichiers par date*/
        /*annee.php*/

        $annees = array();
        $mois = array();
        $sfichier = array();

        $source = "/mnt/PROJET-CIRMAR/AisData/";

        if (isset($_POST['annee'])) {
            foreach ($_POST['annee'] as $annee) {
                array_push($annees, $annee);
            }
        } else {
            echo " ";
        }

        if (isset($_POST['mois'])) {
            foreach ($_POST['mois'] as $moi) {
                array_push($mois, $moi);
            }
        } else {
            echo " ";
        }

        if (isset($_POST['sourcefichier'])) {
            foreach ($_POST['sourcefichier'] as $sourcesf) {
                array_push($sfichier, $sourcesf);
            }
        } else {
            echo " ";
        }

        if (isset($_POST['annee']) && isset($_POST['mois']) && isset($_POST['sourcefichier'])) {
            echo '<form method="post" class="content-container col-lg-12 row" action=" " name="zips">';
            echo "<span class=\"col-lg-12 cocherdecocher fichierChoisi\">
            <div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" class=\"checkbox custom-control-input\" id=\"Checkcocherdecochefichier\" onclick=\"selectAllFichier(this)\">
				<label class=\"custom-control-label\" id=\"textFichier\" for=\"Checkcocherdecochefichier\">Cocher tous les fichiers</label> 
			 </div>
		    </span>";
            echo "<div class='col-lg-7 fichierChoisi'>";
            echo "Fichier(s) trouvé(s) : ";
            echo "<br/>";
            echo "<br/>";
            //echo "<input type=\"checkbox\" id=\"Tout\" name=\"Tout\" onclick=\"selectAllFichier(this)\" />Cocher/Decocher tous les fichiers";

            $monthsFr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

            for ($i = 0; $i < sizeof($annees); $i++) {
                echo "<strong>Année : ".$annees[$i]."</strong>";
                echo "<br/>";
                for ($j = 0; $j < sizeof($mois); $j++) {
                    $moisChiffre = $mois[$j];
                    echo "<strong>Mois : ".$monthsFr[$moisChiffre-1]."</strong>";
                    echo "<br/>";
                    for ($k = 0; $k < sizeof($sfichier); $k++) {
                        echo "<strong>Source : ".$sfichier[$k]."</strong>";
                        echo "<br/>";
                        $date1 = $annees[$i] . $mois[$j];
                        $sfichiers = $sfichier[$k];
                        //echo $date1." / ".$sfichiers;
                        recursiveScan($source, $date1, $sfichiers);
                    }
                    echo "<br/>";
                }
                echo "<br/><hr><br/><br/>";
            }

            echo "</div>";
            echo "<div class=col-lg-5'>";
            echo '<input class="form-control" type="submit" id="submit" class="creationZip" name="createzip" value="Générer une archive contenant tous les fichiers cochés" >';
            echo "</div>";
            echo '</form>';
        }


        function recursiveScan($dir, $date1, $sfichiers)
        {
            $tree = glob(rtrim($dir, '/') . '/*');
            if (is_array($tree)) {
                foreach ($tree as $file) {
                    if (is_dir($file)) {
                        recursiveScan($file, $date1, $sfichiers);
                    } elseif (is_file($file)) {

                        if (strpos($file, ($date1)) && strpos($file, ".csv") && strpos($file, $sfichiers)) {
                            //echo '<input class="chk fichie" type="checkbox" name="files[]" value="' . $file . '">' . $file . '' . "\n";

                            $split = $file;

                            $pieces = explode("/", $split);

                            if((sizeof($pieces[8]) == 0) || strlen($pieces[8]) == 0){
                                $empFichier = $pieces[7];
                            }
                            else {
                                $empFichier = $pieces[8];
                            }





                            echo "<div class=\"custom-control custom-checkbox fichier\">
											<input type=\"checkbox\" name=\"files[]\" class=\"checkbox custom-control-input fichie\" id=\"Check$file\" value=\"" . $file . "\">
											<label class=\"custom-control-label\" for=\"Check$file\">" . $empFichier . "</label> 
										</div>";


                        }

                    }
                }
            }
        } ?>

        <?php

        /*fonction qui permet d'afficher les fichiers par date*/
        /*download.php*/
        /*
        if (file_exists('FichierCSV.zip') == true) {
            unlink('FichierCSV.zip');

        }

        $zip = new ZipArchive();*/
        /*filename : nom de l'archive*/
        /*$res = $zip->open('FichierCSV.zip', ZipArchive::CREATE);
        echo "<br/>";

        if (isset($_POST['files'])) {
            echo "<div class='content-container col-lg-12 row'>";
            echo "<div class='col-lg-8 fichierChoisi'>";
            echo "Fichier(s) choisi(s) : ";
            echo "<br/>";
            echo "<br/>";
            foreach ($_POST['files'] as $name) {
                if ($res === TRUE) {

                    $zip->addFile($name);

                    echo "<p>" . $name . "</p>";

                } else {
                    echo 'échec';
                }
            }
            echo '<br/>';
            echo "</div>";
            echo "<div class='col-lg-4'>";
            echo '<a class="btn btn-primary" href="FichierCSV.zip" download><i class="fa fa-download"></i> Télécharger l\'archive</a>';
            echo "</div>";
            echo "</div>";

        } else {
            echo "<br/>";
            echo ' ';
        }

        $zip->close();
        */
        ?>

    </section>
</main>

<?php

// Fonction pour explorer les fichiers du répertoire parent précisé plus haut
// Avec $dir (le répertoire parent) et $niv (le niveau des fichiers/dossiers)
function explorateurFichier($dossierParent, $nivDossier = 0)
{
    $page = null;
    $dossiers = null;
    $fichiers = null;
    if ($nivDossier == 0) {
        $page .= '	<ul>' . "\n";
    }
    if ($handle = opendir($dossierParent)) {
        while (false !== ($name = readdir($handle))) {
            $chemin = $dossierParent . '/' . $name;
            if (is_dir($dossierParent . '/' . $name)) // dossiers
            {
                if ($name != '..' && $name != '.') {
                    //str_repeat permet de repeter les tabulations en fonction de l'emplacement du fichier
                    $dossiers .= str_repeat("\t", $nivDossier + 1) . '<li class="dossierParent ">' . $name . "\n";
                    $dossiers .= str_repeat("\t", $nivDossier + 2) . '<ul class="sub_dir">' . "\n";
                    $dossiers .= explorateurFichier($dossierParent . '/' . $name, $nivDossier + 1);
                }
            } else { // Affichage fichier

                $infoFichier = new SplFileInfo($name);

                //Si l'extension du fichier est un .csv, alors on permet le téléchargement du fichier
                if ($infoFichier->getExtension() == 'csv') {
                    $fichiers .= str_repeat("\t", $nivDossier + 2) . '<span class="dossierParent">' . $name . '<ul class="sub_dir"></ul>   </span>' . "\n";
                } //Sinon on n'affiche que le nom du fichier
                else {
                    $fichiers .= str_repeat("\t", $nivDossier + 2) . '<li class="fils">' . $name . '</li>' . "\n";
                }
            }

            if (is_dir($dossierParent . '/' . $name)) {
                if ($name != '..' && $name != '.') {
                    $dossiers .= str_repeat("\t", $nivDossier + 2) . '</ul>' . "\n";
                    $dossiers .= str_repeat("\t", $nivDossier + 1) . '</li>' . "\n";
                }
            }
        }
        //closedir($handle);
        $page .= $dossiers; // Affichage des dossiers
        $page .= $fichiers; // Affichage des fichiers
    }
    if ($nivDossier == 0) {
        $page .= '	</ul>' . "\n";
    }
    return $page;
}

;

?>

<?php
function selecteded()
{

    $monthsFr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

    $sourceFichier = array("ais-localantenna", "aishub", "gpmh");

    echo '<form  method="post" action="" name="zips">';
    //echo "<input type=\"checkbox\" id=\"Tout\" name=\"Tout\" onclick=\"selectAllAnnee(this)\" />Cocher/Decocher toutes les annnes";
    echo "<span class=\"cocherdecocher\">
            <div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" class=\"checkbox custom-control-input\" id=\"Checkcocherdecocheannees\" onclick=\"selectAllAnnee(this)\">
				<label class=\"custom-control-label\" id=\"textAnnee\" for=\"Checkcocherdecocheannees\">Cocher toutes les années</label> 
			 </div>
		    </span>";
    echo "<div class=\"annee\">";
    echo "Année : &nbsp;";
    for ($i = 2015; $i <= date('Y'); $i++) {
        // L'année est-elle l'année courante ?
        if ($i == date('Y')) {
            $selected = ' selected="selected"';
        }
        // Affichage de la ligne
        // echo "<input class=\"chk annees\" type=\"checkbox\" name=\"annee[]\" value=\"$i\">&nbsp;$i";
        echo "<div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" name=\"annee[]\" class=\"checkbox custom-control-input chk annees\" id=\"Check$i\" value=\"" . $i . "\">
				<label class=\"custom-control-label\" for=\"Check$i\">" . $i . "</label> 
			    </div>";
        echo "&nbsp;";
        echo "&nbsp;";
    }
    echo "</div>";
    //echo "<input type=\"checkbox\" id=\"Tout\" name=\"Tout\" onclick=\"selectAllMois(this)\" />Cocher/Decocher toutes les mois";
    echo "<span class=\"cocherdecocher\"><div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" class=\"checkbox custom-control-input\" id=\"Checkcocherdecochermois\" onclick=\"selectAllMois(this)\">
				<label class=\"custom-control-label\" id=\"textMois\" for=\"Checkcocherdecochermois\">Cocher tous les mois</label> 
			    </div>
			    </span>";
    echo "<div class=\"mois\">";
    echo "<label>Mois : &nbsp;</label>";
    for ($i = 1; $i <= 12; $i++) {
        $mois = $i - 1;
        if ($i < 10) {
            $i = "0" . $i;
        }
        // Affichage de la ligne
        //echo "<input class=\"chk moiss\" type=\"checkbox\" name=\"mois[]\" value=\"$i\">&nbsp;$monthsFr[$mois]";
        echo "<div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" name=\"mois[]\" class=\"checkbox custom-control-input chk moiss\" id=\"Check$monthsFr[$mois]\" value=\"" . $i . "\">
				<label class=\"custom-control-label\" for=\"Check$monthsFr[$mois]\">" . $monthsFr[$mois] . "</label> 
			    </div>";
        echo "&nbsp;";
        echo "&nbsp;";
    }
    echo "</div>";
    echo "<span class=\"cocherdecocher\"><div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" class=\"checkbox custom-control-input\" id=\"Checkcocherdecochersourcefichier\" onclick=\"selectAllSourceFichier(this)\">
				<label class=\"custom-control-label\" id=\"textSourceFichier\" for=\"Checkcocherdecochersourcefichier\">Cocher toutes les sources</label> 
			    </div>
			    </span>";
    echo "<div class=\"sourcefichiers\">";
    echo "<label>Source : &nbsp;</label>";
    for ($i = 0; $i < sizeof($sourceFichier); $i++) {
        // Affichage de la ligne
        //echo "<input class=\"chk moiss\" type=\"checkbox\" name=\"mois[]\" value=\"$i\">&nbsp;$monthsFr[$mois]";
        echo "<div class=\"custom-control custom-checkbox\">
				<input type=\"checkbox\" name=\"sourcefichier[]\" class=\"checkbox custom-control-input chk sourcefichier\" id=\"Check$sourceFichier[$i]\" value=\"" . $sourceFichier[$i] . "\">
				<label class=\"custom-control-label\" for=\"Check$sourceFichier[$i]\">" . $sourceFichier[$i] . "</label> 
			    </div>";
        echo "&nbsp;";
        echo "&nbsp;";
    }
    echo "</div>";
    echo '<input class="form-control" type="submit" id="submit" name="recherche" value="Rechercher par période" >';
    echo '</form>';
}


?>

<?php
include_once "includes/footer.php";
?>
