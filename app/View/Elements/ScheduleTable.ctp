<?php
$tableCells = "";
$mealTypes = array();

if(isset($breakfasts))
{
	debug($breakfasts);
	$mealTypes['breakfast'] = $breakfasts;
}

if(isset($lunches))
	$mealTypes['lunch'] = $lunches;

if(isset($dinners))
	$mealTypes['dinner'] = $dinners;

foreach($mealTypes as $meals)
{
	//debug ( $breakfasts );
	$cols = '';
	foreach ( $meals as $index => $meal ) {
		(null === $meal ['recipe_id'])? $temp = '':$temp = $meal ['recipe_id'];
		$cols .= $this->Html->tag ( 'td', $temp );
	}
	$tableCells .= $this->Html->tag ( 'tr', $cols );
}
debug($tableCells);
$sched = $this->Html->tag ( 'table', $tableCells, array('class' => 'table'));
echo $sched;