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
		// they can acces the index and view actions of any controller
		// as long as they dont override
		$this->Auth->allow ( 'index', 'view', 'add');
	}

	/**
	 * Logs in the user
	 */
	public function login() {
		if ($this->request->is ( 'post' )) {
			if ($this->Auth->login ()) {
				$this->redirect ( $this->Auth->redirectUrl () );
			}
		} else {
			$this->Session->setFlash ( 'Incorrect Username or Password', 'default', array (), 'auth' );
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
	public function add(){
		if($this->request->is('post'))
		{
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('Your account has been successfully created!');
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash('Error creating account!');
			}
		}
	}
}