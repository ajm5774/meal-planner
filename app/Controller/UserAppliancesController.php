<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */

App::import('Model', 'Appliance');
App::import('Model', 'User');

class UserAppliancesController extends AppController {
	var $name = 'UserAppliances';

	public function edit()
	{
		$id = $this->Auth->user();
	
		$appliance = new Appliance();
		$allAppliances = $appliance->find('list');
		$appliances = $this->UserAppliance->find('all', array('conditions' => array('user_id' => $id)));
		
		$temp = array();
		foreach($appliances as $index => &$models)
		{
			unset($models['UserAppliance']['user_id']);
			$models['UserAppliance']['app_id'] = $allAppliances[$models['UserAppliance']['app_id']];
		}
			
		$this->set('appliances', $appliances);
		$this->set('allAppliances', $allAppliances);
	
		return array($appliances, $allAppliances);
	}
	
	public function datatableDelete() {
		$this->request->onlyAllow('post');

		$explode = explode('.', $this->request->data('id'));
		$this->request->data['id'] = $explode[0];
		$this->UserAppliance->id = $this->request->data['id'];
		Debugger::log($this->request->data);

		if ($this->UserAppliance->delete()) {
			echo 'ok';
			return $this->redirect(null);
		}
		$this->Session->setFlash(__('Appliance was not removed'));
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
			Debugger::log($this->request->data);

			$explode = explode('.', $this->request->data['id']);
			$data['UserAppliance']['id'] = $explode[0];
			$data['UserAppliance'][$this->request->data['field']] = $this->request->data['value'];
			$data['UserAppliance']['user_id'] = $this->Auth->user('id');
			Debugger::log($data);
			if ($this->UserAppliance->save ( $data )) {
				echo $this->request->data['value'];
				return $this->redirect(null);
			} else {
				$this->Session->setFlash ( 'Error editting appliance!' );
			}
		}
	}
	
	/**
	 * attempts to add a user to the users table
	 */
	public function datatableAdd() {
		$id = $this->Auth->user('id');
	
		if ($this->request->is ( 'post' )) {
			$data['UserAppliance'] = $this->request->data;
			$data['UserAppliance']['user_id'] = $id;
			$r = $this->UserAppliance->create ();
			if ($this->UserAppliance->save ( $data )) {
				echo $this->UserAppliance->id;
				return $this->redirect(null);
			} else {
				$this->Session->setFlash ( 'Error adding appliance!' );
			}
		}
	}
}