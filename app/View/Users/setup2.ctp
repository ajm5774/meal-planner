<?php
echo $this->html->div('', $this->Session->flash(), array('id' => 'flash'));
$data = $this->request->data;

$fav = $this->Html->tag ( 'p', "5. Add recipes to your list of favorites to have them more often.", array (
		'class' => 'step' 
) );
$fav .= $this->HTml->div ( 'grid_12 table', $this->element ( 'FavoritesTable' ) );
echo $this->Html->div ( 'prefix_6 grid_12 suffix_6', $fav );

$dis = $this->Html->tag ( 'p', "6. Add recipes to the list of dislikes to prevent them from showing up on your schedule.", array (
		'class' => 'step'
) );
$dis .= $this->HTml->div ( 'grid_12 table', $this->element ( 'DislikesTable' ) );
echo $this->Html->div ( 'prefix_6 grid_12 suffix_6', $dis );

echo $this->Form->create ();
echo '<center>' . $this->Form->end ( 'Finish Setup!' ) . '</center>';

?>

<script>
$(document).ready(function(){$( "input[type=submit]" ).button();});
</script>
