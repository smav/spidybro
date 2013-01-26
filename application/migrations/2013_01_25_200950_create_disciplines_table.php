<?php

class Create_Disciplines_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disciplines', function($table)
		{
			$table->integer('id')->unsigned()->unique()->primary();
			$table->string('name')->unique();
		});

		DB::table('disciplines')->insert(array(
			'id' => 1,
			'name' => 'Huntsman'
		));
		DB::table('disciplines')->insert(array(
			'id' => 2,
			'name' => 'Artificer'
		));
		DB::table('disciplines')->insert(array(
			'id' => 3,
			'name' => 'Weaponsmith'
		));
		DB::table('disciplines')->insert(array(
			'id' => 4,
			'name' => 'Armorsmith'
		));
		DB::table('disciplines')->insert(array(
			'id' => 5,
			'name' => 'Leatherworker'
		));
		DB::table('disciplines')->insert(array(
			'id' => 6,
			'name' => 'Tailor'
		));
		DB::table('disciplines')->insert(array(
			'id' => 7,
			'name' => 'Jeweler'
		));
		DB::table('disciplines')->insert(array(
			'id' => 8,
			'name' => 'Cook'
		));

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('disciplines');
	}

}
