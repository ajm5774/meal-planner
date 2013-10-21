<?php
/**
 * This class controls the data for the user_recipes table in the mysql database.
 *
 * @author Andrew
 */
class UserRecipe extends AppModel {
	public $belongsTo = array('Recipe', 'User');

	const FAVORITE = 0;
	const DISLIKE = 1;
}