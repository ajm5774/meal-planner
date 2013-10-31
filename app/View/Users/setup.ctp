<?php
$slider = $this->html->div('', '', array('id' => 'slider'));
$devSlider = $this->html->div('', '', array('id' => 'slider2'));
echo $this->Form->create;
echo $this->Html->tag('p', "1. Use slider to select your cooking skill level");
echo $slider;
echo $this->Html->tag('p', "2. Use slider to select your meal deviation");
echo $devSlider;
echo $this->Html->tag('p', "3. Create an inventory by adding items");
echo $this->element('InventoryTable', array('options' => array('class' => 'table', 'style' => 'width: 500px;')));
echo '<br><br>';
echo $this->Html->tag('p', "4. Set your kitchen appliances by adding them to the table");
echo $this->element('ApplianceTable', array('options' => array('class' => 'table', 'style' => 'width: 500px;')));
$end =$this->Form->end('Submit');
echo $end;
?>

<script>
$('#slider').slider();
$('#slider2').slider();
$(document).ready(function(){$( "button" ).button();});
</script>