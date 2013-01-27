<?php

class Watchlist_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		if (Auth::check())
		{
			$lists = DB::table('watchlists')
				->where('user_id', '=', Auth::user()->id);
			$templates = array(
				'none' => 'No Template',
				'tier1' => 'Tier 1 Mats',
				'tier2' => 'Tier 2 Mats',
				'etc'   => 'etc',
			);

			$this->layout->nest('content', 'watchlist.index', array(
				'lists' => $lists,
				'templates' => $templates,
			));
		}
		else
		{
			return Redirect::to_action('user@login')
				->with('info', 'Please log in to use the watchlist feature.');
		}
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

		// make a gw2db link
		foreach ($items as &$item)
		{
			$this->addLink($item);
		}

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
