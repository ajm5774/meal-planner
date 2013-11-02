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
		$data = $this->RecipeIngredient->find('all', array('conditions' => array('RecipeIngredient.recipe_id' => $recipeId)));
		$recName = $data[0]['Recipe']['name'];
		
		$ingredients = '';
		
		foreach($data as $ingredient)
		{
			$unit = $this->RecipeIngredient->enumUnit($data[0]['RecipeIngredient']['unit']);
			$quantity = $data[0]['RecipeIngredient']['quantity'];
			$name = $data[0]['Ingredient']['name'];
		
			$ingredients .= $quantity . ' ' .  $unit . ' ' . $name . ',';
		}
		
		$ingredients = rtrim($ingredients, ",");
		
		$instructions = $data[0]['Recipe']['description'];
		$instructions = str_replace("\n","<br>",$instructions);
		
		$this->set(compact('ingredients', 'instructions', 'recName'));
		$this->layout = 'recipe';
		
		return $data;
	}
	
}