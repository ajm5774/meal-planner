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

class RecipeIngredientsController extends AppController {
	var $name = 'RecipeIngredients';

	public function view($recipeId)
	{
		$data = $this->RecipeIngredient->find('all', array('conditions' => array('recipe_id' => $recipeId)));
		
		$this->set('data', $data);
		
		return $data;
	}
	
}