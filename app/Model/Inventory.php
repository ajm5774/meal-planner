<?php
/**
 * This class controls the data for the inventories table in the mysql database.
 *
 * @author Andrew
 */
class Inventory extends AppModel {
	public $belongsTo = array('Ingredient', 'User');

	public function afterFind($results, $primary = false)
	{
		foreach($results as $index => $model)
		{
			$fields = &$results[$index][$this->alias];
			if(isset($fields['unit']))
			{
				$fields['unit'] = parent::enumUnit($fields['unit']);
			}
		}

		return $results;
	}
}