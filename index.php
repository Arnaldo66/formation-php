<?php
function chargerClasse($classe)
{
	require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}


spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$perso = new Personnage(60,0);