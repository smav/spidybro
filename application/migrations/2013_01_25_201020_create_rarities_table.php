<?php

class Create_Rarities_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rarities', function($table)
		{
			$table->integer('id')->unsigned()->unique()->primary();
			$table->string('name')->unique();
		});

		DB::table('rarities')->insert(array(
			'id' => 0,
			'name' => 'Junk'
		));
		DB::table('rarities')->insert(array(
			'id' => 1,
			'name' => 'Common'
		));
		DB::table('rarities')->insert(array(
			'id' => 2,
			'name' => 'Fine'
		));
		DB::table('rarities')->insert(array(
			'id' => 3,
			'name' => 'Masterwork'
		));
		DB::table('rarities')->insert(array(
			'id' => 4,
			'name' => 'Rare'
		));
		DB::table('rarities')->insert(array(
			'id' => 5,
			'name' => 'Exotic'
		));
		DB::table('rarities')->insert(array(
			'id' => 6,
			'name' => 'Legendary'
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rarities');
	}

}
