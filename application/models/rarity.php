<?php
class Rarity extends Eloquent {

	public static $table = 'rarities';

	public function items()
	{
		return $this->has_many('Items','rarity');
	}
}

