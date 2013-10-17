<?php
/**
 * This class controls the data for the recipes table in the mysql database.
 *
 * @author Andrew
 */
class Recipe extends AppModel {
	public $hasMany = array(
			'Schedule' => array(
					'className' => 'Schedule',
					'foreignKey' => 'recipe_id',
					'dependent' => true
			),
			'RecipeIngredient' => array(
					'className' => 'RecipeIngredient',
					'foreignKey' => 'recipe_id',
					'dependent' => true
			),
			'UserRecipe' => array(
					'className' => 'UserRecipe',
					'foreignKey' => 'recipe_id',
					'dependent' => true
			)
	);
	
	public $hasAndBelongsToMany = array(
			'Appliance' =>
			array(
					'className' => 'Appliance',
					'joinTable' => 'recipe_appliances',
					'foreignKey' => 'recipe_id',
					'associationForeignKey' => 'app_id',
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