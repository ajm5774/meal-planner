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
		$units = $this->Inventory->enumUnit();
		$this->set('ingredients', $ingredients);
		$this->set('units', $units);

		if ($this->request->is ( 'post' )) {
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
			return array($inventory, $ingredients, $units);
		}
	}

	public function datatableDelete() {
		$this->request->onlyAllow('post');

		$explode = explode('.', $this->request->data('id'));
		$this->request->data['id'] = $explode[0];
		$this->Inventory->id = $this->request->data['id'];

		if ($this->Inventory->delete()) {
			echo 'ok';
			return $this->redirect(null);
		}
		$this->Session->setFlash(__('Item was not deleted'));
		return $this->redirect(array('action' => 'edit'));
	}
	
	/**
	 * attempts to add a user to the users table
	 * 
	 * Data comes in the form: 
	 * array(
	 *     'value' => '14',
	 *     'id' => '0.unit.Row',
	 *     'field' => 'quantity',
	 *     'rowId' => '0',
	 *     'columnPosition' => '1',
	 *     'columnId' => '1',
	 *     'columnName' => 'Quantity'
     *  )
	 */
	public function datatableEdit() {
		if ($this->request->is ( 'post' )) {

			$explode = explode('.', $this->request->data['id']);
			$data['Inventory']['id'] = $explode[0];
			$data['Inventory'][$this->request->data['field']] = $this->request->data['value'];
			$data['Inventory']['user_id'] = $this->Auth->user('id');

			if ($this->Inventory->save ( $data )) {
				echo $this->request->data['value'];
				return $this->redirect(null);
			} else {
				$this->Session->setFlash ( 'Error editting item!' );
			}
		}
	}
	
	/**
	 * attempts to add a user to the users table
	 */
	public function datatableAdd() {
		$id = $this->Auth->user('id');
	
		if ($this->request->is ( 'post' )) {
				
			$data['Inventory'] = $this->request->data;
			$data['Inventory']['user_id'] = $id;
			$r = $this->Inventory->create ();
			if ($this->Inventory->save ( $data )) {
				echo $this->Inventory->id;
				return $this->redirect(null);
			} else {
				$this->Session->setFlash ( 'Error adding item!' );
			}
		}
	}
}