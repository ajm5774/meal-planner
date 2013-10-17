<?php
/**
 * This class controls the data for the ingredients table in the mysql database.
 *
 * @author Andrew
 */
class Ingredient extends AppModel {
	public $hasMany = array(
			'Inventory' => array(
					'className' => 'Inventory',
					'foreignKey' => 'ingredient_id',
					'dependent' => true
			),
			'RecipeIngredient' => array(
					'className' => 'RecipeIngredient',
					'foreignKey' => 'ingredient_id',
					'dependent' => true
			),
	);
}
