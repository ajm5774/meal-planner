<?php
/**
 * $inventory should be in the form:
 * array('milk' => array(3, 'gal'), 'chicken breast' => array(6, 'oz'))
 *
 */
//if the $inventory variable didnt get passed into the element then request the data from the controller
if(!isset($myAppliances) || !isset($allAppliances))
{
	$appliances = $this->requestAction ('/users/appliances');
	$myAppliances = $appliances[0];
	$allAppliances = $appliances[1];
}

//for testing
if(empty($myAppliances))
	$inventory = array(array('Oven'), array('Microwave'));

if(empty($options))
	$options = array();
$element = '';

$headers = $this->Html->tableHeaders(array('id', 'Name'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = $this->Html->tableCells($myAppliances);

$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRow', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRow', 'class' => 'delete_row'));

$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'appTable', 'class' => 'display'));
$form = $this->Form->create('users', array('id' => 'formAddNewRow', 'title' => 'Add Inventory Item'));
$form .= $this->Form->input('Appliance.id', array('rel' => '0', 'div' => false, 'type' => 'hidden')) . '<br>';
$form .= $this->Form->input('Appliance.name', array('rel' => '1', 'div' => false, 'options' => $allAppliances,)) . '<br>';
$form .= $this->Form->end();
$element .= $form;
echo $this->Html->div('', $element, $options);
//debug($form);
?>

<script>
$(document).ready( function () {
    $('#appTable').dataTable().makeEditable({
        sUpdateURL: "/Inventories/edit",
        "aoColumns": [
                      {
                    	  //type: 'hidden',
                      },
                      {
                    	  type: 'select',
                          data: '<?php echo json_encode($allAppliances);?>',
                      },
              ]});
} );

$( "button" ).button();

</script>