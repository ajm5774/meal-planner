<?php
/**
 * This class controls the data for the appliances table in the mysql database.
 *
 * @author Andrew
 */
class Appliance extends AppModel {
	public $hasAndBelongsToMany = array (
			'User' => array (
					'className' => 'User',
					'joinTable' => 'user_appliances',
					'foreignKey' => 'app_id',
					'associationForeignKey' => 'user_id',
					'unique' => true,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'finderQuery' => '',
					'with' => '' 
			),
			'Recipe' => array (
					'className' => 'Recipe',
					'joinTable' => 'recipe_appliances',
					'foreignKey' => 'app_id',
					'associationForeignKey' => 'recipe_id',
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