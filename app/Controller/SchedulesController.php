<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */
App::uses('CakeTime', 'Utility');
class SchedulesController extends AppController {
	var $name = 'Schedules';

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
	public function index() {
		if ($this->request->is ( 'get' )) {
			$name = $this->Auth->user();
			//$this->Inventory->contain();
			$start = date('Y-m-d', strtotime('now'));
			$end = date('Y-m-d', strtotime('+4 day'));
			$schedule = $this->Schedule->find('all', array('conditions' => array('User.username' => $name, 'Schedule.date <=' => $end, 'Schedule.date >=' => $start)));
			$meals['breakfast'] = Hash::extract($schedule, '{n}.Schedule[meal=1]');
			$meals['lunch'] = Hash::extract($schedule, '{n}.Schedule[meal=2]');
			$meals['dinner'] = Hash::extract($schedule, '{n}.Schedule[meal=3]');

			$recipes = $this->Schedule->Recipe->find('list');

			foreach($meals as &$meal)
			{
				foreach($meal as $index => &$fields)
				{
					$fields['recipe_id'] = $recipes[$fields['recipe_id']];
				}
			}
			$this->set('breakfasts', $meals['breakfast']);
			$this->set('lunch', $meals['lunch']);
			$this->set('dinner', $meals['dinner']);
			$this->set('schedule', $schedule);
		}

	}

	public function generate()
	{
		$inventory = $this->Inventory->find('all');

		$schedule = $this->Schedule->generate($inventory);
	}
}