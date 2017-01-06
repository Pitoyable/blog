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

  public function display($instance) {
    echo "<section>
          <h1>".$this -> titre."</h1>
          <h3><em>".$this -> chapo."</em></h3>
          <p>".$this -> contenu."</p>
          </section>";

  }

  public function edit($instance, $titre, $chapo, $contenu) {
    $sql = "UPDATE article SET titre = '".$titre."', chapo = '".$chapo."', contenu = '".$contenu."'";

    $edit = $instance->query($sql);

    echo "L'article à été édité.";
  }

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
