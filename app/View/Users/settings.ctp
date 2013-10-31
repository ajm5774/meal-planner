<?php
echo $this->Form->create;
$email = $this->Form->input('User.email', array('label' => false));
$slider = $this->html->div('', '', array('id' => 'slider'));
$end = '<center>' . $this->Form->end('Submit') . '</center>';

$settingsTableCells = $this->Html->tableCells(array(array('Change Email', $email), array('Skill Level', $slider)));
echo $this->Html->div('grid_4 table', $this->Html->tag('table', $settingsTableCells) . $end);

$appTable = $this->element('ApplianceTable');
echo $this->Html->div('grid_7 table', $appTable);

?>

<script>
$('#slider').slider();
$(document).ready(function(){$( "button" ).button();});
</script>