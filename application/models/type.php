<?php
class Type extends Eloquent {

	public function items()
	{
		return $this->has_many('Items');
	}

	static public function findall()
	{
		$types = self::all();
		$newtypes = array();
		foreach ($types as $type)
		{
			$subtypes = json_decode($type->subtypes);
			//die(var_dump($subtypes));
			$type->subtypes = $subtypes;
			$newtypes[] = $type;
		}
		return $newtypes;
	}
}
