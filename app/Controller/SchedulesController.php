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
			$id = $this->Auth->user('id');
			//$this->Inventory->contain();
			$start = date('Y-m-d', strtotime('now'));
			$end = date('Y-m-d', strtotime('+4 day'));
			$schedules = $this->Schedule->find('all', array('conditions' => array('User.id' => $id, 'Schedule.date <=' => $end, 'Schedule.date >=' => $start)));
			$recipes = $this->Schedule->Recipe->find('list');
			
			$meals = array();
			foreach(array('Breakfast' => 1, 'Lunch' =>2, 'Dinner'=>3) as $meal => $mealNum)
			{
				$meals[$meal] = Hash::extract($schedules, '{n}.Schedule[meal=' . $mealNum . ']');
				$dates = array();
				for($i = 0; $i < 4; $i++)
				{
					$date = date('Y-m-d', strtotime('+' . $i . ' days'));
	
					$dates[$date] = Hash::extract($meals[$meal], '{n}[date=' . $date . ']');
				}
				
				$meals[$meal] = $dates;
			}
			$this->set('meals', $meals);
			$this->set('schedules', $schedules);
			$this->set('recipes', $recipes);
			
			$this->loadModel('User');
			$this->User->contain();
			$this->set('user', $this->User->find('first', array('conditions' => array('id' => $this->Auth->user('id')))));
		}

	}

	public function generate()
	{
		$numDays = $this->request->data['Schedule']['numDays'];
		
		$this->loadModel('Inventory');
		$this->loadModel('User');
		$this->loadModel('Recipe');
		$inventory = $this->Inventory->find('all');
		$recipes = $this->Recipe->find('list');
		
		$data = array('User' => array('id' => $this->Auth->user('id'), 'sched_gen' => date ( 'Y-m-d', strtotime ( '+' . $numDays . ' days' ) )));
		Debugger::log($data);
		Debugger::log($this->Auth->user());
		$result = $this->User->save($data);
		Debugger::log($result);
		$schedule = $this->Schedule->generate($inventory, $recipes, $numDays);
		
		$this->redirect('/Schedules/index');
	}
	
	public function clear()
	{
		$this->Schedule->deleteAll(array('user_id' => $this->Auth->user('id')));
		
		$data = array('User' => array('id' => $this->Auth->user('id'), 'sched_gen' => date ( 'Y-m-d', strtotime ( '-1 days' ) )));
		Debugger::log($this->Auth->user());
		$this->loadModel('User');
		$result = $this->User->save($data);
		
		$this->redirect('/Schedules/index');
	}
}