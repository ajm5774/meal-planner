<?php
$email = $this->Form->input('User.email');
$slider = $this->html->div('', '', array('id' => 'slider'));

$settingsTableCells = $this->Html->tableCells(array(array('Change Email', $email), array('Skill Level', $slider)));
echo $this->Html->div('grid_3', $this->Html->tag('table', $settingsTableCells));

$appTable = $this->element('ApplianceTable');
echo $this->Html->div('grid_4 table', $appTable);

$invTable = $this->element('InventoryTable');
echo $this->Html->div('grid_4 table', $invTable);
?>

<script>
$('#slider').slider();
</script>