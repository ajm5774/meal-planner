<?php
class AppSchema extends CakeSchema {
	public function before($event = array()) {
		$db = ConnectionManager::getDataSource($this->connection);
		$db->cacheSources = false;
		return true;
	}
	public function after($event = array()) {
		if (isset ( $event ['create'] )) {
			switch ($event ['create']) {
				case 'users' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$user = ClassRegistry::init ( 'User' );
					$user->create ();
					$user->save ( array (
							'User' => array (
									'username' => 'test',
									'password' => '',
									'email' => 'test@test.com' 
							) 
					) );
					
					break;
				case 'ingredients' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$ingr = ClassRegistry::init ( 'Ingredient' );
					$ingr->create ();
					$ingr->save ( array (
							'Ingredient' => array (
									'name' => 'Chicken Breast' 
							) 
					) );
					
					break;
				case 'appliances' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$appl = ClassRegistry::init ( 'Appliance' );
					$appl->create ();
					$appl->save ( array (
							'Appliance' => array (
									'name' => 'Oven' 
							) 
					) );
					
					break;
				case 'recipes' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$recipe = ClassRegistry::init ( 'Recipe' );
					$recipe->create ();
					$recipe->save ( array (
							'Recipe' => array (
									'name' => 'Chicken Marsala',
									'Description' => 'Ingredients: .5 lbs Chicken Breast, 8 oz. Tomato Paste

									Directions: 
									1) Cook chicken in a pan.
									2) Cook pasta in pot.
									3) Cut chicken into bit size pieces.
									4) more directions later...',
									
									'skill' => '5 ' 
							) 
					) );
					
					break;
			}
		}
	}
	public $users = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'username' => array (
					'type' => 'string',
					'null' => false,
					'length' => 50,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'password' => array (
					'type' => 'string',
					'null' => false,
					'length' => 50,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'email' => array (
					'type' => 'string',
					'null' => false,
					'length' => 100,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'skill' => array (
					'type' => 'integer',
					'null' => false,
					'default' => 5 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $appliances = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'name' => array (
					'type' => 'string',
					'null' => false,
					'default' => null,
					'length' => 100,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $recipes = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'name' => array (
					'type' => 'string',
					'null' => false,
					'default' => null 
			),
			'description' => array (
					'type' => 'string',
					'null' => false,
					'default' => null,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'skill' => array (
					'type' => 'integer',
					'null' => false 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $recipe_appliances = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'recipe_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'app_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $schedules = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'user_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'recipe_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'date' => array (
					'type' => 'date',
					'null' => false,
					'default' => null 
			),
			'meal' => array (
					'type' => 'integer',
					'null' => false 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $inventories = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'user_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'ingredient_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'quantity' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null 
			),
			'unit' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $ingredients = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'name' => array (
					'type' => 'string',
					'null' => false,
					'default' => null,
					'length' => 100,
					'collate' => 'latin1_swedish_ci',
					'charset' => 'latin1' 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $recipe_ingredients = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'recipe_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'ingredient_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'quantity' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null 
			),
			'unit' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $user_recipes = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'user_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'recipe_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'opinion' => array (
					'type' => 'integer',
					'null' => false 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
	public $user_appliances = array (
			'id' => array (
					'type' => 'integer',
					'null' => false,
					'default' => null,
					'key' => 'primary' 
			),
			'user_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'app_id' => array (
					'type' => 'integer',
					'null' => false 
			),
			'indexes' => array (
					'PRIMARY' => array (
							'column' => 'id',
							'unique' => 1 
					) 
			),
			'tableParameters' => array (
					'charset' => 'latin1',
					'collate' => 'latin1_swedish_ci',
					'engine' => 'InnoDB' 
			) 
	);
}
