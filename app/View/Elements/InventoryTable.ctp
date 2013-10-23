<?php
/**
 * $inventory should be in the form:
 * array('milk' => array(3, 'gal'), 'chicken breast' => array(6, 'oz'))
 *
 */
//if the $inventory variable didnt get passed into the element then request the data from the controller
if(!isset($inventory))
	$inventory = $this->requestAction ('/Inventories/edit');

//for testing
if(empty($inventory))
	$inventory = array(array('Chicken Breast', 5, '0z'), array('Chicken Thighs', 10, '0z'));

if(empty($options))
	$options = array('id' => 'sidebar');
$element = '';
$headers = $this->Html->tableHeaders(array('id', 'Item', 'Quantity', 'Unit'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = $this->Html->tableCells($inventory);

$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRow', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRow', 'class' => 'delete_row'));
//echo $this->Html->div('add_delete_toolbar');
$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'invTable', 'class' => 'display'));

$form = $this->Form->create('users', array('id' => 'formAddNewRow', 'title' => 'Add Inventory Item'));
$form .= $this->Form->input('Ingredient.id', array('rel' => '0', 'div' => false, 'type' => 'hidden')) . '<br>';
$form .= $this->Form->input('Ingredient.name', array('rel' => '1', 'div' => false, 'options' => $ingredients, 'type' => 'select')) . '<br>';
$form .= $this->Form->input('Inventory.quantity', array('rel' => '2', 'div' => false)) . '<br>';
$form .= $this->Form->input('Inventory.unit', array('rel' => '3', 'div' => false, 'options' => $units)) . '<br>';
$form .= $this->Form->end();
$element .= $form;
echo $this->Html->div('', $element, $options);
//debug($form);
?>

<script>
$(document).ready( function () {
    $('#invTable').dataTable().makeEditable({
        sUpdateURL: "/Inventories/edit",
        "aoColumns": [
                      {
                    	  //type: 'hidden',
                      },
                      {
                    	  type: 'select',
                          data: '<?php echo json_encode($ingredients);?>',
                      },
                      {

                      },
                      {
                    	  type: 'select',
                          data: '<?php echo json_encode($units);?>',
                      }
              ]});
} );

$( "button" ).button();

</script>