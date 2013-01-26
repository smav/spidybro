<?php

class Create_Prices_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function($table)
		{
			$table->increments('id');
			$table->date('price_last_changed');
			$table->integer('max_offer_unit_price')->unsigned();
			$table->integer('min_sale_unit_price')->unsigned();
			$table->integer('offer_availability')->unsigned();
			$table->integer('sale_availability')->unsigned();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prices');
	}

}
