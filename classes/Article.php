<?php
class Article
{
  public $id;
  public $jour;
  public $titre;
  public $chapo;
  public $contenu;

  public function __construct($titre, $chapo, $contenu) {
    $this -> titre = $titre;
    $this -> chapo = $chapo;
    $this -> contenu = $contenu;
  }

  public function display() {}
    // afficher larticle, choper dans la bdd, mettre en page

  public function edit() {}
    // modifier larticle

  public function write($instance) {
    // ecrire larticle et envoyer en bdd
    $sql = $instance->prepare("INSERT INTO article (titre, chapo, contenu) VALUES (:titre, :chapo, :contenu)");

    $sql->execute(array(
      ":titre" => $this -> titre,
      ":chapo" => $this -> chapo,
      ":contenu" => $this -> contenu
    ));
  }
}
