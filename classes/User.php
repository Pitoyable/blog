<?php
class User
{
  public $pseudo;
  public $email;
  public $password;
  public $nom;
  public $prenom;
  private $id;

  public function logOut() {
    unset($_SESSION['user']);
  }

  public function logIn($instance) {
    // connexion à la BDD
    session_start();
    
    $sql = "SELECT pseudo, email FROM user WHERE pseudo = '".$this -> pseudo."' AND email = '".$this -> email."'";

    var_dump($sql);

    $user = $instance->query($sql)->fetch();

    if (isset($user)) {
      $_SESSION['user'] = array(
        "pseudo" => $user['pseudo'],
        "email" => $user['email'],
      );
      echo "Vous êtes connecté";
    }
  }

  public function signIn($instance) {
    // connexion à la BDD avec init
    $sql = "SELECT * FROM user WHERE email = '" .$this -> email."'";
    $user = $instance -> query($sql)->fetchAll();

    if ($user) {
      $message = "Cette adresse e-mail n'est pas disponible";
    }
    else
    {
      $mdp = password_hash($this -> password, PASSWORD_DEFAULT)."\n";

      $sql = $instance->prepare("INSERT INTO user (pseudo, email, password, nom, prenom ) VALUES (:pseudo, :email, :password, :nom, :prenom)");

      $sql->execute(array(
        ":pseudo" => $this -> pseudo,
        ":email" => $this -> email,
        ":password" => $mdp,
        ":nom" => $this -> nom,
        ":prenom" => $this -> prenom
      ));

      if ($sql) {
        $message = "L'inscription à réussi !";
      } else {
        $message = "L'inscription n'a pas pu aboutir";
      }
    }
    echo $message;
  }

  public function __construct($pseudo, $email, $password) {
    $this -> pseudo = $pseudo;
    $this -> email = $email;
    $this -> password = $password;
  }
}
