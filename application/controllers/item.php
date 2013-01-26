<?php

class Item_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		//return View::make('item.index')->with('types', $data);
		$this->layout->nest('content', 'item.index');
	}

	public function post_search()
	{
		// Get the items
		$term = Input::get('term');
		$term = '%'.$term.'%';
		$items = DB::table('items')
			->where('name', 'LIKE', $term)
			->get();
		//->paginate(10);
		//die(var_dump($items));

		// make a gw2db link
		foreach ($items as &$item)
		{
			$this->addLink($item);
		}

		$this->layout->nest('content', 'item.index', array(
			'items' => $items
		));
	}

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
		foreach ($items as &$item)
		{
			$this->addLink($item);
		}

		// Send data to the view
		$this->layout->nest('content', 'item.index', array(
			'items' => $items
		));
		//die(var_dump($items));
	}

}
