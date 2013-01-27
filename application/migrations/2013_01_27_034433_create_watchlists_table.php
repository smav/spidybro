<?php

class Create_Watchlists_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('watchlists', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name', 64);
			$table->boolean('readonly');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('watchlists');
	}

}
