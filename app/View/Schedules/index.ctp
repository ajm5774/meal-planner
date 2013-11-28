<?php
echo $this->html->div('', $this->Session->flash(), array('id' => 'flash'));
$schedGen = $user['User']['sched_gen'];
if(strtotime($schedGen) < strtotime('+0 days'))
{
	$cell1 = $this->form->create('Schedule', array('action' => 'generate'));
	$cell1 .= $this->form->input('Schedule.numDays', array('value' => 1, 'type' => 'number', 'label' => 'Number of Days'));
	$options = array('class' => 'bigButton', 'label' => 'Generate Schedule');
	$cell2 = $this->form->end($options);

	$tableCells = $this->Html->tableCells(array(array($cell1), array($cell2),));

	$table = $this->Html->tag('table', $tableCells);

	echo $this->html->div('', '<center>' . $table . '</center>');
}
else
{
	$table = $this->element('ScheduleTable');
	echo '<center>' . $this->html->div('', $table) . '<center>';
	
	$clear = $this->Html->tag('button','Clear Schedule', array('class' => 'bigButton', 'onclick' => 'clearConfirmation(this);', 'href' => '/schedules/clear/'));
	echo '<center>' . $this->html->div('', $clear) . '<center>';
	
	/*$table = $this->element('ScheduleTable');
	echo '<center>' . $this->html->div('', $table) . '<center>';

	echo '<br>';

	$adv = $this->Html->tag('button','Advance Schedule', array('onclick' => 'advanceSchedule();', 'role' => 'button'));
	
	$clear = $this->form->create('Schedule', array('action' => 'clear'));
	$clear .= $this->form->end('Clear Schedule');

	$buttonCells = $this->Html->tableCells(array(array($clear)));
	$buttonTable = $this->Html->tag('table', $buttonCells);

	echo '<center>' . $this->Html->div('', $buttonTable) . '</center>';
	*/
}
?>

<script>
$('.bigButton').button();
//$('button').button();
function advanceSchedule()
{
	alert('Schedule advanced 1 day');
}

function clearConfirmation(element)
{
	url = $(element).attr('href');
	if(confirm('Are you sure you wish to clear your entire schedule?'))
	{
		window.location = url;
	}
}
</script>