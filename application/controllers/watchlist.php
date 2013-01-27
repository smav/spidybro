<?php

class Watchlist_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		if (Auth::check())
		{
			$watchlists = DB::table('watchlists')
				->where('user_id', '=', Auth::user()->id)
				->get();

			$templates = array(
				'none' => 'No Template',
			);

			$roTemplates = DB::table('watchlists')
				->where('user_id', '=', 0)
				->where('readonly', '=', true)
				->get();

			$this->layout->nest('content', 'watchlist.index', array(
				'watchlists' => $watchlists,
				'templates' => array_merge($templates, $roTemplates),
			));
		}
		else
		{
			return Redirect::to_action('user@login')
				->with('info', 'Please log in to use the watchlist feature.');
		}
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

	public function post_add()
	{
		$new_list           = new Watchlist();
		$new_list->readonly = false;
		$new_list->user_id  = Auth::user()->id;

		$template           = Input::get('template');
		$list               = array();
		if ($template == 'none')
		{
			$new_list->name = Input::get('name');
		}
		else
		{
			//$list = DB::table('watchlists')
			//	->where('id', '=', $template)
			//	->get();
			$list = Watchlist::find($template);
			$new_list->name = $list->name;
		}
		if ($new_list->save())
		{
			if (!empty($list->items))
			{
				foreach ($list->items as $item)
				{
					$new_list->items()->attach($item['id']);
				}
			}
			return Redirect::to_action('watchlist@index')
				->with('success', 'Created new watchlist.');
		}
		else
		{
			return Redirect::to_action('watchlist@index')
				->with('error', 'Failed to save new watchlist.');
		}
	}

}
