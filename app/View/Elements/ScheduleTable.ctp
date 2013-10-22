<?php
$breakRow = "";
$lunRow = "";
$dinRow = "";
if(isset($breakfasts)){
	foreach($breakfasts as $breakfast){
		$temp = $this->Html->tag('td', $breakfast['recipe_id']);
		$breakRow .= $temp;
	}
	
	if(isset($lunches)){
		foreach($lunches as $lunch){
			$temp = $this->Html->tag('td', $lunch['recipe_id']);
			$lunRow .= $temp;
		}
	}
	
	if(isset($dinners)){
		foreach($dinners as $dinner){
			$temp = $this->Html->tag('td', $dinner['recipe_id']);
			$dinRow .= $temp;
		}
	}
	
	$breakRow = $this->Html->tag('tr', $breakRow);
	$lunRow = $this->Html->tag('tr', $lunRow);
	$dinRow = $this->Html->tag('tr', $dinRow);
	$temp = $breakRow + $lunRow + $dinRow;
	$sched = $this->Html->tag('table', $temp);
} else {
	$temp = $this->Html->tag('td', "to be populated with meal data");

	//creates 3 cells for a day(ie 3 meals)
	$temp .= $temp + $temp;
	//one day, with 3 meals
	$day = $this->Html->tag('td', $temp);
	
	//4 columns for 4 days
	$temp = $day + $day + $day + $day;
	
	$sched = $this->Html->tag('table', $temp);
}