<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */

App::import('Controller', 'User');

class InventoriesController extends AppController {
	var $name = 'Inventories';

	/**
	 * attempts to add a user to the users table
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->Inventory->create ();
			if ($this->Inventory->save ( $this->request->data )) {
				$this->Session->setFlash ( 'Inventory item added!' );

			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
	}

	/**
	 */
	public function index() {
		return true;
	}

	/**
	 * attempts to add a user to the users table
	 */
	public function edit() {

		$ingredients = $this->requestAction('/ingredients/index');
		$this->set('ingredients', $ingredients);
		$this->set('units', $this->Inventory->enumUnit());

		if ($this->request->is ( 'post' )) {
			Debugger::log($this->request->data());
			if ($this->Inventory->save ( $this->request->data )) {
				$this->Session->setFlash ( 'Inventory item added!' );

			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
		if ($this->request->is ( 'get' )) {
			$id = $this->Auth->user('id');
			//$this->Inventory->contain();
			$inventory = $this->Inventory->find('all', array('conditions' => array('User.id' => $id)));
			$inventory = Hash::extract($inventory, '{n}.Inventory');
			$inventory = Hash::remove($inventory, '{n}.user_id');

			foreach($inventory as $index => &$attr)
			{
				$attr['ingredient_id'] = $ingredients[$attr['ingredient_id']];
			}
			$this->set('inventory', $inventory);

			return $inventory;
		}



	}

}