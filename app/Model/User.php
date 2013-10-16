<?php
/**
 * This file controls the data for the users table in the mysql database
 *
 * @author - Andrew Mueller
 */
class User extends AppModel
{
	var $name = 'User';

	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['Password']))
		{
			//hash the password before its stored
			$this->data[$this->alias]['Password'] = AuthComponent::password($this->data[$this->alias]['Password']);
		}
		unset($this->data[$this->alias]['password_confirmation']);

		debug($this->data);
		return true;
	}
}