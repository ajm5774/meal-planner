<?php
/**
 * This class controls the data for the inventories table in the mysql database.
 *
 * @author Andrew
 */
class Inventory extends AppModel {
	public $belongsTo = array('Ingredient', 'User');
}