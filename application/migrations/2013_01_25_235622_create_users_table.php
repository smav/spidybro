<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('email', 128);
			$table->string('name', 128);
			$table->timestamps();
		});

		DB::table('users')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('password'),
			'email'    => 'www@localhost',
			'name'     => 'Admin'
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
