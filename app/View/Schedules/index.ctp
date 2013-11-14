<?php
echo $this->html->div('', $this->Session->flash(), array('id' => 'flash'));
$schedGen = $user['User']['sched_gen'];
if(strtotime($schedGen) < strtotime('+0 days'))
{
	$cell1 = $this->form->create('Schedule', array('action' => 'generate'));
	$cell1 .= $this->form->input('Schedule.numDays', array('value' => 1, 'type' => 'number', 'label' => 'Number of Days'));
	$cell2 = $this->form->end('Generate Schedule');

	$tableCells = $this->Html->tableCells(array(array($cell1), array($cell2),));

	$table = $this->Html->tag('table', $tableCells);

	echo $this->html->div('', '<center>' . $table . '</center>');
}
else
{
	$table = $this->element('ScheduleTable');
	echo '<center>' . $this->html->div('', $table) . '<center>';

	echo '<br>';

	$adv = $this->Html->tag('button','Advance Schedule', array('onclick' => 'advanceSchedule();', 'role' => 'button'));

	$clear = $this->form->create('Schedule', array('action' => 'clear'));
	$clear .= $this->form->end('Clear Schedule');

	$buttonCells = $this->Html->tableCells(array(array($adv, $clear)));
	$buttonTable = $this->Html->tag('table', $buttonCells);

	echo '<center>' . $this->Html->div('', $buttonTable) . '</center>';
}
?>

<script>
$('input[type=submit]').button();
$('button').button();
function advanceSchedule()
{
	alert('Schedule advanced 1 day');
}
</script>