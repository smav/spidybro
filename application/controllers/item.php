<?php

class Item_Controller extends Base_Controller {

	public $restful = true;

	//public function get_index()
	//{
		//$this->layout->nest('content', 'item.index');
	//}

	public function post_search()
	{
		// Get the items
		$term = Input::get('term');
		$term = '%'.$term.'%';
		$items = DB::table('items')
			->where('name', 'LIKE', $term)
			->get();
		//->paginate(10);

		// make a gw2db link
		$this->addInfo($items);

		$this->layout->nest('content', 'item.index', array(
			'items' => $items
		));
	}

	public function get_view($data_id)
	{
		if ( $items = DB::table('items')
			->where('data_id', '=', $data_id)
			->get() )
		{
			// make a gw2db link
			foreach ($items as &$item)
			{
				$this->addLink($item);
			}

			$this->layout->nest('content', 'item.view', array(
				'items' => $items
			));
		}
		else
		{
			return Redirect::back()
				->with('error', 'Invalid item id : '.$data_id);
		}
	}
}
