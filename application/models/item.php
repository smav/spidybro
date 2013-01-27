<?php
class Item extends Eloquent {

	public function type()
	{
		return $this->belongs_to('Type');
	}

	public function rarity()
	{
		return $this->belongs_to('Rarity');
	}

	public function prices()
	{
		return $this->has_many('Price');
	}

	/*public function discipline()
	{
		return $this->belongs_to('Discipline');
	}*/

	public function watchlists()
	{
		return $this->has_many_and_belongs_to('Watchlist');
	}

}
