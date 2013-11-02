<?php
$data = $this->request->data;

echo $this->html->div('', $this->Session->flash(), array('id' => 'flash'));
echo $this->Form->create();

echo $this->Form->input ( 'User.skill', array (
		'id' => 'skill',
		'type' => 'hidden' 
) );
echo $this->Form->input ( 'User.deviation', array (
		'id' => 'deviation',
		'type' => 'hidden'
) );
echo $this->Form->input ( 'User.id');
$email = $this->Form->input ( 'User.email', array (
		'label' => false 
) );
$slider = $this->html->div ( '', '', array (
		'id' => 'slider1',
		'class' => 'slider' 
) );
$devSlider = $this->html->div ( '', '', array (
		'id' => 'slider2',
		'class' => 'slider' 
) );
$end = '<center>' . $this->Form->end ( 'Submit' ) . '</center>';

$settingsTableCells = $this->Html->tableCells ( array (
		array (
				'Change Email',
				$email 
		),
		array (
				'Skill Level',
				$slider 
		),
		array (
				'Deviation',
				$devSlider 
		) 
) );
echo $this->Html->div ( 'grid_5 table', $this->Html->tag ( 'table', $settingsTableCells ) . $end );

$appTable = $this->element ( 'ApplianceTable' );
echo $this->Html->div ( 'grid_7 table', $appTable );

//echo '<br><br>';

$dislikesTable = $this->element ( 'DislikesTable' );
echo $this->Html->div ( 'grid_7 table', $dislikesTable );

$favoritesTable = $this->element ( 'FavoritesTable' );
echo $this->Html->div ( 'grid_6 table', $favoritesTable );

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