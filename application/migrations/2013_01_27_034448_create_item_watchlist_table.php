<?php

class Create_Item_Watchlist_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_watchlist', function($table) {
			$table->increments('id');
			$table->integer('item_id');
			$table->integer('watchlist_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_watchlist');
	}

}
