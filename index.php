<?php

class MaClasse

{

private $unAttributPrive;

public function __get($nom)

{

return 'Impossible d\'accéder à l\'attribut <strong>' . $nom . '</strong>, désolé !<br />';

}

}

$obj = new MaClasse;

echo $obj->attribut;

echo $obj->unAttributPrive;