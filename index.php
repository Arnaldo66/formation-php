<?php

function chargerClasse($classe)
{
	require $classe . '.php'; // On inclut la classe correspondante au param�tre pass�.
}


spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

//appelle le constructeur du personnage, ce dernier hydrate l'objet
$perso = new Personnage([
	'nom' => 'Victor',
	'forcePerso' => 5,
	'degats' => 0,
	'niveau' => 1,
	'experience' => 0
]);

//recupère la connection pour la passer au manager
$db = new PDO('mysql:host=localhost;dbname=formation-php', 'root', '25041981');
$manager = new PersonnageManager($db);
//persiste le personnage
$manager->add($perso);