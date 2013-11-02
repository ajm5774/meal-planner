<?php
$data = $this->request->data;

$step1 = $this->Html->tag ( 'p', "1. Use slider to select your cooking skill level", array (
		'class' => 'step' 
) );
echo $this->html->div ( 'prefix_6 grid_12 suffix_6', $step1 );

$slider = $this->html->div ( '', '', array (
		'id' => 'slider1',
		'class' => 'slider' 
) );
echo $this->Html->div ( 'prefix_6 grid_6 suffix_12', $slider );

$step2 = $this->Html->tag ( 'p', "2. Use slider to select your meal deviation", array (
		'class' => 'step' 
) );
echo $this->html->div ( 'prefix_6 grid_12 suffix_6', $step2 );

$devSlider = $this->html->div ( '', '', array (
		'id' => 'slider2',
		'class' => 'slider' 
) );
echo $this->Html->div ( 'prefix_6 grid_6 suffix_12', $devSlider );

echo $this->html->div('clear','');

$inv = $this->Html->tag ( 'p', "3. Create an inventory by adding items", array (
		'class' => 'step' 
) );
$inv .= $this->HTml->div ( 'grid_12 table', $this->element ( 'InventoryTable' ) );
echo $this->Html->div ( 'prefix_6 grid_12 suffix_6', $inv );

echo $this->html->div('clear','');

$app = $this->Html->tag ( 'p', "4. Set your kitchen appliances by adding them to the table", array (
		'class' => 'step' 
) );
$app .= $this->HTml->div ( 'grid_12 table', $this->element ( 'ApplianceTable' ) );
echo $this->Html->div ( 'prefix_6 grid_12 suffix_6', $app );

echo $this->Form->create ();
echo $this->Form->input ( 'User.skill', array (
		'id' => 'skill',
		'type' => 'hidden' 
) );
echo $this->Form->input ( 'User.deviation', array (
		'id' => 'deviation',
		'type' => 'hidden' 
) );
echo $this->Form->input ( 'User.id' );
echo '<center>' . $this->Form->end ( 'Submit' ) . '</center>';

?>

<script>
$('#slider1').slider({min:1, max:10, step:1, value: <?php echo $data['User']['skill'];?>,
		stop: function(event, ui){
			$value = $('#slider1').slider('value');
			$('#skill').attr('value', $value);
		}
		});
	$('#slider2').slider({min:1, max:10, step:1, value: <?php echo $data['User']['deviation'];?>,
		stop: function(event, ui){
			$value = $('#slider2').slider('value');
			$('#deviation').attr('value', $value);
		}
		});
$(document).ready(function(){$( "input[type=submit]" ).button();});
</script>