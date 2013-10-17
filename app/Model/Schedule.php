<?php
/**
 * This class controls the data for the schedule table in the mysql database.
 *
 * @author Andrew
 */
class Schedule extends AppModel {
	public $belongsTo = array('Recipe', 'User');
}