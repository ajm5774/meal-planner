<?php
/**
 * This class controls the data for the recipe_ingredients table in the mysql database.
 *
 * @author Andrew
 */
class RecipeIngredient extends AppModel {
	public $belongsTo = array('Ingredient', 'Recipe');
}