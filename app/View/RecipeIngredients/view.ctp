<?php
$cellOptions = array('class' => 'meal');

$tableData = array(array('Name', $recName), array('Ingredients', $ingredients), array('Instructions', $instructions),);

$tableCells = '';
foreach($tableData as $row)
{
	$content = '';
	foreach($row as $col)
	{
		$content .= $this->Html->tag('td', $col, array('class' => 'meal'));
	}
	$tableCells .= $this->Html->tag('tr', $content);
}

$table = $this->Html->tag('table', $tableCells, array('class' => 'table'));

echo $table;