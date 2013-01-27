<?php

class Type_Controller extends Base_Controller {

	public function action_search($type_id = null, $sub_type_id = null)
	{
		// Get the items
		if (!is_null($sub_type_id))
		{
			$items = DB::table('items')
				->where('type_id', '=', $type_id)
				->where('sub_type_id', '=', $sub_type_id)
				->get();
				//->paginate(10);
		}
		else{
			$items = DB::table('items')
				->where('type_id', '=', $type_id)
				->get();
		}

		// make a gw2db link
		$this->addInfo($items);

		// Send data to the view
		$this->layout->nest('content', 'item.index', array(
			'items' => $items
		));
	}

}
