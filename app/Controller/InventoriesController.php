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
		Debugger::log($this->request->data);
		if ($this->request->is ( 'post' )) {
			Debugger::log($this->request->data);
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

	public function datatableDelete() {
		$this->request->onlyAllow('post');

		$explode = explode('.', $this->request->data('id'));
		$this->request->data['id'] = $explode[0];
		$this->Inventory->id = $this->request->data['id'];
		Debugger::log($this->request->data);

		if ($this->Inventory->delete()) {
			$this->Session->setFlash(__('Item deleted'));
			return $this->redirect(array('action' => 'edit'));
		}
		$this->Session->setFlash(__('Item was not deleted'));
		return $this->redirect(array('action' => 'edit'));
	}
	
	/**
	 * attempts to add a user to the users table
	 */
	public function datatableEdit() {
	
		$ingredients = $this->requestAction('/ingredients/index');
		$this->set('ingredients', $ingredients);
		$this->set('units', $this->Inventory->enumUnit());
		
		Debugger::log($this->request->data);
		if ($this->request->is ( 'post' )) {
			Debugger::log($this->request->data);
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
	
	/**
	 * attempts to add a user to the users table
	 */
	public function datatableAdd() {
		$id = $this->Auth->user('id');
	
		if ($this->request->is ( 'post' )) {
				
			debug($this->request->data);
			$data = $this->request->data;
			$data['Inventory']['user_id'] = $id;
			Debugger::log($data);
			$this->Inventory->create ();
			if ($this->Inventory->save ( $data )) {
				$this->Session->setFlash ( 'Inventory item added!' );
				Debugger::log($this->request);
				return $this->render('/Inventories/edit');
			} else {
				$this->Session->setFlash ( 'Error adding item!' );
			}
		}
	}

}