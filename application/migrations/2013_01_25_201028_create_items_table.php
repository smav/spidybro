<?php

class Create_Items_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table)
		{
			$table->increments('id');
			$table->integer('data_id');
			$table->string('name');
			$table->integer('rarity')->unsigned();
			$table->integer('restriction_level')->unsigned();
			$table->string('img');
			$table->integer('type_id')->unsigned();
			$table->integer('sub_type_id')->unsigned();
			$table->integer('gw2db_external_id')->unsigned();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
