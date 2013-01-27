<?php
class User extends Eloquent {

	public function watchlists()
	{
		return $this->has_many('Watchlist');
	}

}
