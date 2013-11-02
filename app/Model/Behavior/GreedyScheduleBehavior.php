<?php
/**
 * This class controls the data for the appliances table in the mysql database.
 *
 * @author Andrew
 */
class GreedyScheduleBehavior extends ModelBehavior {

	public function generate($model, $inventory, $recipes, $numDays)
	{
		$id = CakeSession::read("Auth.User.id");
		
		for($i = 0; $i < $numDays; $i ++) {
			$date = date ( 'Y-m-d', strtotime ( '+' . $i . ' days' ) );
			
			$model->create ();
			$model->save ( array (
					'Schedule' => array (
							'user_id' => $id,
							'recipe_id' => 2,
							'date' => $date,
							'meal' => 1 
					) 
			) );
			
			$model->create ();
			$model->save ( array (
					'Schedule' => array (
							'user_id' => $id,
							'recipe_id' => 3,
							'date' => $date,
							'meal' => 2
					)
			) );
			
			$model->create ();
			$model->save ( array (
					'Schedule' => array (
							'user_id' => $id,
							'recipe_id' => 1,
							'date' => $date,
							'meal' => 3 
					) 
			) );
		}
	}
}
