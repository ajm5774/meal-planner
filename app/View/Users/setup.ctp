<?php

echo $this->Form->create;

$step1 = $this->Html->tag('p', "1. Use slider to select your cooking skill level", array('class' => 'step'));
echo $this->html->div('prefix_3 grid_6 suffix_3', $step1);

$slider = $this->html->div('', '', array('id' => 'slider'));
echo $this->Html->div('prefix_3 grid_3 suffix_6', $slider);

$step2 = $this->Html->tag('p', "2. Use slider to select your meal deviation", array('class' => 'step'));
echo $this->html->div('prefix_3 grid_6 suffix_3', $step2);

$devSlider = $this->html->div('', '', array('id' => 'slider2'));
echo $this->Html->div('prefix_3 grid_3 suffix_6', $devSlider);


$inv = $this->Html->tag('p', "3. Create an inventory by adding items", array('class' => 'step'));
$inv .= $this->HTml->div('grid_12 table', $this->element('InventoryTable'));
echo $this->Html->div('prefix_3 grid_6 suffix_3', $inv);

echo '<br><br>';

$app = $this->Html->tag('p', "4. Set your kitchen appliances by adding them to the table", array('class' => 'step'));
$app .= $this->HTml->div('grid_12 table', $this->element('ApplianceTable'));
echo $this->Html->div('prefix_3 grid_6 suffix_3', $app);

echo '<br><br>';

$end = '<center>' . $this->Form->end('Submit') . '</center>';
echo $end;
?>

<script>
$('#slider').slider();
$('#slider2').slider();
$(document).ready(function(){$( "input" ).button();});
</script>