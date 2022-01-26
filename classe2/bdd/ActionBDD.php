<?php

///
/// Classe représentant une action en base de données
///
class ActionBDD
{
    /**
     * identifiant unique dans la bdd
     */
    private $id;

    /**
     * Numéro de l'action
    */
    private $numeroAction;

    /**
     * Nom de l'action
    */
    private $nom;

    /**
    * Liens vers un média de l'action
     */
    private $mediaAction;

    /**
     * Ensemble des sous action
     * Représenté ici par un tableau d'ActionBDD, en base
     * une table dédiée sous-action existe
     */
    private $sousActions = array();

    /**
     * consutructeur par défaut
     * @param $id id unique en base
     * @param $nom nom de l'action
     */
    public function __construct($id, $numeroAction, $nom, $mediaAction)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->numeroAction = $numeroAction;
        $this->mediaAction = $mediaAction;
    }

    /**
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param id $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumeroAction()
    {
        return $this->numeroAction;
    }

    /**
     * @param mixed $numeroAction
     */
    public function setNumeroAction($numeroAction)
    {
        $this->numeroAction = $numeroAction;
    }

    /**
     * @return nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param nom $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMediaAction()
    {
        return $this->mediaAction;
    }

    /**
     * @param mixed $mediaAction
     */
    public function setMediaAction($mediaAction)
    {
        $this->mediaAction = $mediaAction;
    }

    /**
     * @return array
     */
    public function getSousActions()
    {
        return $this->sousActions;
    }

    /**
     * Permet d'avoir une sous action de l'action
     * @param int
     * @return sous action à l'indice i ou null
    */
    public function getSousAction($i)
    {
        return $this->sousActions[$i];
    }

    /**
     * retourne le nombre de sous action de l'action
     * @return int
    */
    public function getNbSousActions()
    {
        return sizeof($this->sousActions);
    }

    /**
     * @param array $sousActions
     */
    public function setSousActions($sousActions)
    {
        $this->sousActions = $sousActions;
    }



    public function ajouterSousAction(ActionBDD $action)
    {
        array_push($this->sousActions, $action);
    }

    public function __toString()
    {
        return "ID: " . $this->id . " NOM: " . $this->nom . " " . " nombre de sous actions: " .sizeof($this->sousActions);
    }
}