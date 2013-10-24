<?php
$tableCells = "";
$mealTypes = array();

if(isset($breakfasts))
	$mealTypes['breakfast'] = $breakfasts;

if(isset($lunches))
	$mealTypes['lunch'] = $lunches;

if(isset($dinners))
	$mealTypes['dinner'] = $dinners;

foreach($mealTypes as $meals)
{
	//debug ( $breakfasts );
	foreach ( $meals as $index => $meal ) {
		$tableCells .= $this->Html->tag ( 'td', $meal ['recipe_id'] );
	}
}

$sched = $this->Html->tag ( 'table', $tableCells, array('class' => 'table'));
echo $sched;