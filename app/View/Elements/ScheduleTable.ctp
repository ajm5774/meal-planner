<?php
$dates = array_keys($meals['Breakfast']);
array_unshift($dates, '');
$tableHeaders = $this->html->tableHeaders($dates);

$tableCells = '';
foreach($meals as $meal => $dates)
{
	$cols = $this->Html->tag ( 'td', '<b>' . $meal . '</b>', array('class' => 'meal') );
	foreach ( $dates as $date => $index ) {
		if(isset($index[0]['recipe_id']))
		{
			$mealLink = $this->html->tag('a',$recipes[$index[0]['recipe_id']] , array('class' => 'dialog', 'url' => '/RecipeIngredients/view/' . $index[0]['recipe_id'], 'href' => '#'));
			$advanceMeal = $this->html->tag('button', 'Make Meal!', array('onClick' => 'makeMealConfirmation(this)', 'href' =>'/Schedules/advanceMeal/' . $index[0]['id']));
			$content = $mealLink . '<br>' . $advanceMeal;
			$cols .= $this->Html->tag ( 'td', $content, array('class' => 'meal') );
		}
		else
			$cols .= $this->Html->tag ( 'td', '           ', array('class' => 'meal') );
	}
	$tableCells .= $this->Html->tag ( 'tr', $cols );
}
$sched = $this->Html->tag ( 'table', $tableHeaders . $tableCells, array('class' => 'table'));
echo $sched;

echo $this->Html->div('grid_6', '', array('id' => 'dialog', 'title' => 'Meal Description'));
?>

<script>
$( "#dialog" ).dialog({ autoOpen: false, width: 'auto' });
$('a.dialog').click(function(event){
	console.log(event.target);
	$.ajax({url: $(event.target).attr('url'),
			success: function(data){
						$('#dialog').html(data);
						$( '#dialog' ).dialog( "open" );
					}
	});
	
})

function makeMealConfirmation(element)
{
	url = $(element).attr('href');
	if(confirm('Are you sure you wish to remove the meal ingredients from your inventory?'))
	{
		window.location = url;
	}
}

$(document).ready(function(){
	$("th").each(function(){
		var date = "<?php echo date('Y-m-d', strtotime("now"));?>";
			if($(this).html() == date)
			{
				$(this).addClass("today");
			}
		});
});
</script>