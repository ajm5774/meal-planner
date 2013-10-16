<?php
/**
 * This class controls the data for the recipes table in the mysql database.
 *
 * @author Andrew
 */
class Recipe extends AppModel {
	public $hasAndBelongsToMany = array(
			'Ingredient' =>
			array(
					'className' => 'Ingredient',
					'joinTable' => 'ingredients_recipes',
					'foreignKey' => 'recipe_id',
					'associationForeignKey' => 'ingredient_id',
					'unique' => true,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'finderQuery' => '',
					'with' => ''
			)
	);
}