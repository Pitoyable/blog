<?php
require ('./classes/Autoload.php');
spl_autoload_register('Autoload::classesAutoloader');

try {
  $instance = new PDO("mysql:host=localhost;dbname=blog", "root", "");
} catch (Exception $e) {
  Log::writeCSV($e);
  die($e->getMessage());
}

$benoit = new Jeanmichel;
$benoit -> taille = 180;
$benoit -> age = 41;
$benoit -> sex = 'homme';



$kevindu76 = new User("Kevindu76", "jason@gmail.com", "lollavie");
$kevindu76 -> nom = "kevin";
$kevindu76 -> prenom = "teub";

$kevindu76 -> signIn($instance);
$kevindu76 -> logIn($instance);
// $kevindu76 -> logOut();

$kevin = serialize($kevindu76);
var_dump($kevin);

$jason = unserialize($kevin);
var_dump($jason);

var_dump($_SESSION);

$leslacs = new Article("Les Plus beaux lacs", "Voici un top des plus beaux lacs de France", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");

$leslacs -> display($instance);
$leslacs -> edit($instance, "Yo", "Yo", "Salut");

$test = [
  ["text", "nom", "Nom"],
  ["text", "prenom", "Prenom"],
  ["password", "password", "Mot de passe"],
];


var_dump($test);


$form = new Form;
$form -> createForm($test);
