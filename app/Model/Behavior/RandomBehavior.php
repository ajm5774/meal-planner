<?php
/**
 * This class controls the data for the appliances table in the mysql database.
 *
 * @author Andrew
 */
class RandomBehavior extends ModelBehavior {

	public function generate($model, $inventory, $recipes, $numDays)
	{
		$id = CakeSession::read("Auth.User.id");
		
		for($i = 0; $i < $numDays; $i ++) {
			$date = date ( 'Y-m-d', strtotime ( '+' . $i . ' days' ) );
			foreach(array(1,2,3) as $meal)
			{
				$randRecipe = array_rand($recipes);
				$model->create ();
				$model->save ( array (
						'Schedule' => array (
								'user_id' => $id,
								'recipe_id' => $randRecipe,
								'date' => $date,
								'meal' => $meal
						)
				) );
			}
			
		}
	}
}
