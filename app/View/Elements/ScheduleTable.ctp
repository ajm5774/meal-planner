<?php

$dates = array_keys($meals['Breakfast']);
array_unshift($dates, '');
$tableHeaders = $this->html->tableHeaders($dates);

$tableCells = '';
foreach($meals as $meal => $dates)
{
	$cols = $this->Html->tag ( 'td', $meal, array('class' => 'meal') );
	foreach ( $dates as $date => $index ) {
		if(isset($index[0]['recipe_id']))
		{
			$content = $recipes[$index[0]['recipe_id']];
			$link = $this->html->tag('a',$content , array('href' => '/RecipeIngredients/view/' . $index[0]['recipe_id']));
			$cols .= $this->Html->tag ( 'td', $link, array('class' => 'meal') );
		}
		else
			$cols .= $this->Html->tag ( 'td', '           ', array('class' => 'meal') );
	}
	$tableCells .= $this->Html->tag ( 'tr', $cols );
}
$sched = $this->Html->tag ( 'table', $tableHeaders . $tableCells, array('class' => 'table'));
echo $sched;