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
		$data = $this->User->find('all');

		$this->set('data', $data);
	}

	public function setup()
	{
		$this->loadModel('Ingredient');
		$this->set('ingredients', $this->Ingredient->find('list'));
		$this->set('units', $this->Ingredient->enumUnit());
	}
}