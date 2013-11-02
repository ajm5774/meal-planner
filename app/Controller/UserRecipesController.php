<?php
/**
 * This class controls which data to retrieve, where to send it, and which
 * view page to render.
 *
 * For more information see http://book.cakephp.org/2.0/en/controllers.html
 *
 * @author - Andrew Mueller
 */

App::import('Model', 'Recipe');
App::import('Model', 'User');

class UserRecipesController extends AppController {
	var $name = 'UserRecipes';

	public function edit($opinion)
	{
		$id = $this->Auth->user();
	
		$recipe = new Recipe();
		$allRecipes = $recipe->find('list');
		if(isset($opinion))
			$recipes = $this->UserRecipe->find('all', array('conditions' => array('user_id' => $id, 'opinion' => $opinion)));
		else
			$recipes = $this->UserRecipe->find('all', array('conditions' => array('user_id' => $id)));

		$temp = array();
		foreach($recipes as $index => &$models)
		{
			unset($models['UserRecipe']['user_id']);
			$models['UserRecipe']['recipe_id'] = $allRecipes[$models['UserRecipe']['recipe_id']];
		}
			
		$this->set('recipes', $recipes);
		$this->set('allRecipes', $allRecipes);
	
		return array($recipes, $allRecipes);
	}
	
	public function datatableDelete() {
		$this->request->onlyAllow('post');

		$explode = explode('.', $this->request->data('id'));
		$this->request->data['id'] = $explode[0];
		$this->UserRecipe->id = $this->request->data['id'];
		Debugger::log($this->request->data);

		if ($this->UserRecipe->delete()) {
			echo 'ok';
			return $this->redirect(null);
		}
		$this->Session->setFlash(__('Recipe was not removed'));
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
			$data['UserRecipe']['id'] = $explode[0];
			$data['UserRecipe'][$this->request->data['field']] = $this->request->data['value'];
			$data['UserRecipe']['user_id'] = $this->Auth->user('id');
			Debugger::log($data);
			if ($this->UserRecipe->save ( $data )) {
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
			$data['UserRecipe'] = $this->request->data;
			$data['UserRecipe']['user_id'] = $id;
			$r = $this->UserRecipe->create ();
			if ($this->UserRecipe->save ( $data )) {
				echo $this->UserRecipe->id;
				return $this->redirect(null);
			} else {
				$this->Session->setFlash ( 'Error adding appliance!' );
			}
		}
	}
}