<?php
class AppSchema extends CakeSchema {
	public function before($event = array()) {
		$db = ConnectionManager::getDataSource ( $this->connection );
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
									'password' => 'test',
									'email' => 'test@test.com',
									'sched_gen' => date ( 'Y-m-d', strtotime ( 'now' ) )
							) 
					) );
					
					break;
				case 'ingredients' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$ingr = ClassRegistry::init ( 'Ingredient' );
					
					$ingredients = array (
							'Chicken Breast',
							'Waffle',
							'Chicken Thighs',
							'Flour',
							'Sugar',
							'Tomato Paste',
							'Hamburger',
							'Steak',
							'Potatoes',
							'Cheese'
							
					);
					foreach ( $ingredients as $ingredient ) {
						$ingr->create ();
						$ingr->save ( array (
								'Ingredient' => array (
										'name' => $ingredient 
								) 
						) );
					}
					
					break;
				case 'inventories' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$inv = ClassRegistry::init ( 'Inventory' );
					$inv->create ();
					$inv->save ( array (
							'Inventory' => array (
									'user_id' => 1,
									'ingredient_id' => 1,
									'quantity' => 10,
									'unit' => 1 
							) 
					) );
					
					break;
				case 'schedules' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$sch = ClassRegistry::init ( 'Schedule' );
					
					/*for($i = 0; $i < 4; $i ++) {
						$date = date ( 'Y-m-d', strtotime ( '+' . $i . ' days' ) );
						
						$sch->create ();
						$sch->save ( array (
								'Schedule' => array (
										'user_id' => 1,
										'recipe_id' => 2,
										'date' => $date,
										'meal' => 1 
								) 
						) );
						
						$sch->create ();
						$sch->save ( array (
								'Schedule' => array (
										'user_id' => 1,
										'recipe_id' => 3,
										'date' => $date,
										'meal' => 2
								)
						) );
						
						$sch->create ();
						$sch->save ( array (
								'Schedule' => array (
										'user_id' => 1,
										'recipe_id' => 1,
										'date' => $date,
										'meal' => 3 
								) 
						) );
					}
					*/
					break;
				case 'user_recipes' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$sch = ClassRegistry::init ( 'UserRecipe' );
					$sch->create ();
					$sch->save ( array (
							'UserRecipe' => array (
									'user_id' => 1,
									'recipe_id' => 1,
									'opinion' => 1 
							) 
					) );
					
					$sch->create ();
					$sch->save ( array (
							'UserRecipe' => array (
									'user_id' => 1,
									'recipe_id' => 2,
									'opinion' => 0
							)
					) );
					
					break;
				case 'user_appliances' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$sch = ClassRegistry::init ( 'UserAppliance' );
					$sch->create ();
					$sch->save ( array (
							'UserAppliance' => array (
									'user_id' => 1,
									'app_id' => 1 
							) 
					) );
					
					break;
				case 'appliances' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$appl = ClassRegistry::init ( 'Appliance' );
					
					$apps = array (
							'Oven',
							'Microwave',
							'Toaster Oven',
							'Toaster',
							'Stove',
							'Crock Pot'
					);
					foreach ( $apps as $app ) {
						$appl->create ();
						$appl->save ( array (
								'Appliance' => array (
										'name' => $app 
								) 
						) );
					}
					
					break;
				
				case 'recipe_ingredients' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$recIng = ClassRegistry::init ( 'RecipeIngredient' );
					$recIng->create ();
					$recIng->save ( array (
							'RecipeIngredient' => array (
									'recipe_id' => 1,
									'ingredient_id' => 1,
									'quantity' => 10,
									'unit' => 3 
							) 
					) );
					
					$recIng->create ();
					$recIng->save ( array (
							'RecipeIngredient' => array (
									'recipe_id' => 2,
									'ingredient_id' => 2,
									'quantity' => 2,
									'unit' => 2
							)
					) );
					
					$recIng->create ();
					$recIng->save ( array (
							'RecipeIngredient' => array (
									'recipe_id' => 3,
									'ingredient_id' => 1,
									'quantity' => .5,
									'unit' => 3
							)
					) );
					
					break;
				case 'recipes' :
					App::uses ( 'ClassRegistry', 'Utility' );
					$recipe = ClassRegistry::init ( 'Recipe' );
					$recipe->create ();
					
					$directions1 =  "1) Cook chicken in a pan.\n" . 
									"2) Cook pasta in pot.\n" . 
									"3) Cut chicken into bit size pieces.\n" . 
									"4) more directions later...";
					
					$recipe->save ( array (
							'Recipe' => array (
									'name' => 'Chicken Marsala',
									'description' => $directions1,
									
									'skill' => '5 ' 
							) 
					) );
					
					$recipe->create ();
					$recipe->save ( array (
							'Recipe' => array (
									'name' => 'Waffles',
									"description" => "1) Put waffles in the toaster\n" .
													"2) Lightly spread butter\n" . 
													"3) Smother with syrup\n",
									'skill' => '5 ' 
							) 
					) );
					
					$recipe->create ();
					$recipe->save ( array (
							'Recipe' => array (
									"name" => "Buffalo Chicken Wrap\n",
									"description" => "1) Cook chicken on pan for 10 minutes\n" .
									"2) Combine hot sauce and butter in sauce pan on low for 5 minutes\n" .
									"3) Remove sauce from stove and let sit until warm\n" .
									"4) Coat chicken with sauce\n" .
									"5) Lay a handful of lettuce on an open wrap\n" .
									"6) Cut chicken and lay it on top of lettuce\n" .
									"7) Fold in sides of wrap and roll center until closed\n",
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
			'deviation' => array (
					'type' => 'integer',
					'null' => false,
					'default' => 5 
			),
			'sched_gen' => array (
					'type' => 'date',
					'null' => true,
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
