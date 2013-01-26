<?php
class Price extends Eloquent {

	public function item()
	{
		return $this->belongs_to('Item');
	}

}
