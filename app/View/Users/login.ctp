<?php
$table = $this->Session->flash();
$table .= $this->Form->create ('User');

$tableData = array (
		array ('Username:',
				$this->Form->input ( 'username', array('label' => false) )
		),
		array ('Password:',
				$this->Form->input ( 'password', array('label' => false)  )
		),
);

// wrap the table cells with a table tag, center it and add it
$table .= $this->Html->tableCells($tableData, array(''));
$table = $this->Html->tag('table', $table, array('class' => 'login'));//same style as login


$table .= $this->Form->end ( "Login");

$table = $this->html->tag('center', $table);
echo $table;

?>