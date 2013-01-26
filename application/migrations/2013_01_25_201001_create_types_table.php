<?php

class Create_Types_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function($table)
		{
			$table->integer('id')->unsigned()->unique()->primary();
			$table->string('name')->unique();
			$table->text('subtypes');
		});

		DB::table('types')->insert(array(
			'id' => 0,
			'name' => 'Armor',
			'subtypes' =>
			'[{"id":0,"name":"Coat"},{"id":1,"name":"Leggings"},{"id":2,"name":"Gloves"},{"id":3,"name":"Helm"},{"id":4,"name":"Aquatic Helm"},{"id":5,"name":"Boots"},{"id":6,"name":"Shoulders"}]',
		));
		DB::table('types')->insert(array(
			'id' => 2,
			'name' => 'Bag',
			'subtypes' => '[]',
		));
		DB::table('types')->insert(array(
			'id' => 3,
			'name' => 'Consumable',
			'subtypes' =>
			'[{"id":1,"name":"Food"},{"id":2,"name":"Generic"},{"id":5,"name":"Transmutation"},{"id":6,"name":"Unlock"}]',
		));
		DB::table('types')->insert(array(
			'id' => 4,
			'name' => 'Container',
			'subtypes' => '[{"id":0,"name":"Default"},{"id":1,"name":"Gift Box"}]',
		));
		DB::table('types')->insert(array(
			'id' => 5,
			'name' => 'Crafting Material',
			'subtypes' => '[]',
		));
		DB::table('types')->insert(array(
			'id' => 6,
			'name' => 'Gathering',
			'subtypes' =>
			'[{"id":0,"name":"Foraging"},{"id":1,"name":"Logging"},{"id":2,"name":"Mining"}]',
		));
		DB::table('types')->insert(array(
			'id' => 7,
			'name' => 'Gizmo',
			'subtypes' =>
			'[{"id":0,"name":"Default"},{"id":2,"name":"Salvage"}]',
		));
		DB::table('types')->insert(array(
			'id' => 11,
			'name' => 'Mini',
			'subtypes' => '[]',
		));
		DB::table('types')->insert(array(
			'id' => 13,
			'name' => 'Tool',
			'subtypes' =>
			'[{"id":0,"name":"[[Crafting]]"},{"id":2,"name":"Salvage"}]',
		));
		DB::table('types')->insert(array(
			'id' => 15,
			'name' => 'Trinket',
			'subtypes' =>
			'[{"id":0,"name":"Accessory"},{"id":1,"name":"Amulet"},{"id":2,"name":"Ring"}]',
		));
		DB::table('types')->insert(array(
			'id' => 16,
			'name' => 'Trophy',
			'subtypes' => '[]',
		));
		DB::table('types')->insert(array(
			'id' => 17,
			'name' => 'Upgrade Component',
			'subtypes' => '[{"id":0,"name":"Weapon"},{"id":2,"name":"Armor"}]',
		));
		DB::table('types')->insert(array(
			'id' => 18,
			'name' => 'Weapon',
			'subtypes' =>
			'[{"id":0,"name":"Sword"},{"id":1,"name":"Hammer"},{"id":2,"name":"Longbow"},{"id":3,"name":"Short Bow"},{"id":4,"name":"Axe"},{"id":5,"name":"Dagger"},{"id":6,"name":"Greatsword"},{"id":7,"name":"Mace"},{"id":8,"name":"Pistol"},{"id":10,"name":"Rifle"},{"id":11,"name":"Scepter"},{"id":12,"name":"Staff"},{"id":13,"name":"Focus"},{"id":14,"name":"Torch"},{"id":15,"name":"Warhorn"},{"id":16,"name":"Shield"},{"id":19,"name":"Spear"},{"id":20,"name":"Harpoon Gun"},{"id":21,"name":"Trident"},{"id":22,"name":"Toy"}]',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types');
	}

}
