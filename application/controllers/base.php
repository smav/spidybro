<?php

class Base_Controller extends Controller {

	public $layout = 'templates.main';

	/*
	 *	API setup
	 */
	private $version = 'v0.9';
	private $format  = 'json';
	protected $apiUrl = '';

	public function __construct()
	{
		/* eg 'http://www.gw2spidy.com/api/v0.9/json/' */
		$this->apiUrl = 'http://www.gw2spidy.com/api/'
						.$this->version
						.'/'
						.$this->format
						.'/';

		$this->setupLayout();
	}

	protected function apiGet($apiRequest = '')
	{
		if (! empty($apiRequest))
		{
			return json_decode(file_get_contents($this->apiUrl.$apiRequest), true);
		}
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			//die(var_dump(Type::all()));
			$this->layout = View::make($this->layout)
							->with('types', Type::findall());
		}
	}

	protected function addLink($item = null)
	{
		// http://www.gw2db.com/items/71359-adelberns-royal-signet-ring
		if (is_null($item))
		{
			return null;
		}
		// turn the name into the link format
		$names = explode(' ', $item->name);
		//die(var_dump($names));
		foreach ($names as $name)
		{
			$newnames[] = strtolower($name);
		}
		$fixed = '-'.implode('-', $newnames);

		// Build the link with id and name
		$link = 'http://www.gw2db.com/items/';
		$link .= $item->gw2db_external_id;
		$link .= $fixed;

		$item->gw2db_link = $link;
		//return $item;
	}
}
