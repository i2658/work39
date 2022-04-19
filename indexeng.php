<?php
abstract class Game{
	public $health=100;
	public $round=1;
	abstract public function Damage();
	abstract public function Hit($v);	
	abstract public function DamageInformer();
}

class Red extends Game
{
	public function Damage()
	{	
		return rand(23, 30);
	}
	public function Hit($v)
	{
		if($v->health > 0)
		{
			$v->health -= $this->Damage();
		}
		$v->DamageInformer();		
	}
	public function DamageInformer()
	{
		echo $this->health;
	}	
}

class Blue extends Game
{
	public function Damage()
	{
		return rand(10, 40);
	}
	public function Hit($v)
	{
		if($v->health > 0)
		{
			$v->health -= $this->Damage();
		}	
		$v->DamageInformer();
	}
	public function DamageInformer()
	{
		echo $this->health."<br>";
	}	
}

$red = new Red;
$blue = new Blue;

$red->DamageInformer();
$red->Hit($blue);
$blue->Hit($red);
