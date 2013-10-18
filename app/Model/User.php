<?php
/**
 * This file controls the data for the users table in the mysql database
 *
 * @author - Andrew Mueller
 */

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{
	public $hasMany = array(
			'Inventory' => array(
					'className' => 'Inventory',
					'foreignKey' => 'user_id',
					'dependent' => true
			),
			'UserRecipe' => array(
					'className' => 'UserRecipe',
					'foreignKey' => 'user_id',
					'dependent' => true
			),
	);
	
	public $hasAndBelongsToMany = array(
			'Appliance' =>
			array(
					'className' => 'Appliance',
					'joinTable' => 'user_appliances',
					'foreignKey' => 'user_id',
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
	
	public $validate = array(
			'username' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A username is required'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A password is required'
					)
			),
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		unset($this->data[$this->alias]['password_confirmation']);
		return true;
	}
}