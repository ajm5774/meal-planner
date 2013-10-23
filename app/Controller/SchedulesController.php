<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */

class SchedulesController extends AppController {
	var $name = 'Schedules';

	public function index()
	{

		$data = $this->Schedule->find('all');
		$this->set('schedule', $data);
		return $data;
	}

	/**
	 * attempts to add a user to the users table
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->Schedule->create ();
			if ($this->Schedule->save ( $this->request->data )) {
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
			if ($this->Schedule->save ( $this->request->data )) {
				$this->Session->setFlash ( 'Inventory item added!' );

			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
		if ($this->request->is ( 'get' )) {
			$name = $this->Auth->user();
			//$this->Inventory->contain();
			$schedule = $this->Schedule->find('all', array('conditions' => array('User.username' => $name)));

			//$this->Ingredient->contain();
			$schedule = $this->Schedule->find('all');
			debug($schedule);
			$this->set('schedule', $schedule);
		}

	}
	
	public function generate()
	{
		$inventory = $this->Inventory->find('all');
		
		$schedule = $this->Schedule->generate($inventory);
	}
}