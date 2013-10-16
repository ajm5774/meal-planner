<?php
$table = $this->Form->create ();

$tableData = array (
		array ('Username:',
				$this->Form->input ( 'username', array('label' => false) )
		),
		array ('Email:',
				$this->Form->input ( 'email', array('label' => false)  )
		),
		array ('Password:',
				$this->Form->input ( 'password', array('label' => false)  )
		),
		array ('Confirm Password:',
				$this->Form->input ( 'password_confirmation', array('label' => false, 'type' => 'password')  )
		)
);

// wrap the table cells with a table tag, center it and add it
$table .= $this->Html->tableCells($tableData, array(''));
$table = $this->Html->tag('table', $table, array('class' => 'login'));//same style as login


$table .= $this->Form->end ( "Create Account", array (
		'type' => 'password'
) );

$table = $this->html->tag('center', $table);
echo $table;

