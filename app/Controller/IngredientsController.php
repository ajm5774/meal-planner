<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */

class IngredientsController extends AppController {
	var $name = 'Ingredients';

	public function index()
	{
		
		$data = $this->Ingredient->find('list');
		$this->set('ingredients', $data);
		return $data;
	}
	
	/**
	 * attempts to add a user to the users table
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->Ingredient->create ();
			if ($this->Ingredient->save ( $this->request->data )) {
				$this->Session->setFlash ( 'Inventory item added!' );

			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
	}
	
	/**
	 * attempts to add a user to the users table
	 */
	public function edit() {
		if ($this->request->is ( 'post' )) {
			if ($this->Inventory->save ( $this->request->data )) {
				$this->Session->setFlash ( 'Inventory item added!' );
	
			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
		if ($this->request->is ( 'get' )) {
			$name = $this->Auth->user();
			//$this->Inventory->contain();
			$inventory = $this->Inventory->find('all', array('conditions' => array('User.username' => $name)));
			
			//$this->Ingredient->contain();
			$inventory = $this->Ingredient->find('all');
			debug($inventory);
			$this->set('inventory', $inventory);
		}
		
	}

	/**
	 */
	public function settings() {
	}
}