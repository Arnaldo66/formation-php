<?php

Class Personnage{
	
	private $_id;
	private $_nom;
	private $_degats;
	
	const CEST_MOI = 1;
	const PERSONNAGE_TUE = 2;
	const PERSONNAGE_FRAPPE = 3;
	
	public function __construct(array $data){
		$this->hydrate($data);
	}
	
	public function hydrate(array $data){
		foreach ($data as $key=>$value){
			$method = "set".ucFirst($key);
			if(method_exists($this,$method)){
				$this->$method($value);
			}
		}
	}
	
	
	public function frapper(Personnage $personnage){
		if($personnage->getId() == $this->getId()){
			return self::CEST_MOI;
		}
		
		$personnage->recevoirDegats();
	}
	
	public function recevoirDegats(){
		$this->_degats +=5;
		if($this->_degats >= 100){
			return self::PERSONNAGE_TUE;
		}
		
		return self::PERSONNAGE_FRAPPE;
	}
	
	public function getId(){
		return $this->_id;
	}
	
	
	public function getNom(){
		return $this->_nom;
	}
	
	public function setNom($nom){
		if(is_string($nom)){
			$this->_nom = $nom;
		}
	}
	
	public function getDegats(){
		return $this->_degats;
	}
	
	public function setDegats($degats){
		$degats = int($degats);
		if($degats >= 0 && $degats <= 100){
			$this->_degats = $degats;
		}
	}
	
	public function nomValide()
	{
		return !empty($this->_nom);
	}
	
}