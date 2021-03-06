<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */
class UsersController extends AppController {
	var $name = 'Users';

	/**
	 * determines what not logged in users can do
	 */
	public function beforeFilter() {
		parent::beforeFilter ();
		// they can acces the index and view actions of any controller
		// as long as they dont override
		$this->Auth->allow ( 'add', 'login' );
		$this->set ( 'loggedIn', $this->Auth->loggedIn () );
		$this->Auth->authenticate = array('Form');
	}

	/**
	 * Logs in the user
	 */
	public function login() {
		if ($this->request->is ( 'post' )) {
			if ($this->Auth->login ()) {
				return $this->redirect ( $this->Auth->redirect () );
			} else {
				$this->Session->setFlash ( 'Incorrect Username or Password', 'default', array (), 'flash' );
			}
		}
	}

	/**
	 * Logs out the user
	 */
	public function logout() {
		$this->redirect ( $this->Auth->logout () );
	}

	/**
	 * attempts to add a user to the users table
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->User->create();
			if ($this->User->save ( $this->request->data )) {
				$id = $this->User->id;
				$this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
				$this->Auth->login($this->request->data['User']);
				$this->Session->setFlash ( 'Your account has been successfully created!' );
				$this->redirect ('/users/setup');
			} else {
				$this->Session->setFlash ( 'Error creating account!' );
			}
		}
	}

	public function settings()
	{
		$id = $this->Auth->user('id');
		if($this->request->is('get'))
		{
			$this->User->contain();
			$user = $this->User->find('first', array('conditions' => array('id' => $id)));
	
			$this->data = $user;
		}
		if($this->request->is('put'))
		{
			$this->User->id = $this->request->data['User']['id'];
			if ($this->User->save ( $this->request->data ))
			{
				$this->Session->setFlash ( 'Settings saved successfully!' );
				$this->redirect ('/users/settings');
				
			}
			else
			{
				$this->Session->setFlash ( 'Error saving settings!' );
				$this->redirect ('/users/settings');
			}
		}
	}

	public function setup()
	{
		$this->loadModel('Ingredient');
		$this->set('ingredients', $this->Ingredient->find('list'));
		$this->set('units', $this->Ingredient->enumUnit());
		$id = $this->Auth->user('id');
		if($this->request->is('get'))
		{
			$this->User->contain();
			$user = $this->User->find('first', array('conditions' => array('id' => $id)));
		
			$this->data = $user;
		}
		if($this->request->is('put'))
		{
			$this->User->id = $this->request->data['User']['id'];
			if ($this->User->save ( $this->request->data ))
			{
				$this->Session->setFlash ( 'Setup part 1 completed successfully!' );
				$this->redirect ('/users/setup2');
		
			}
			else
			{
				$this->Session->setFlash ( 'Error saving settings!' );
				$this->redirect ('/users/setup');
			}
		}
	}
	
	public function setup2()
	{
		if($this->request->is('post'))
		{
			$this->Session->setFlash ( 'Setup part 2 completed successfully!' );
			return $this->redirect ('/schedules/index');
		}
	}
	
	public function meal_preferences()
	{
	}
}