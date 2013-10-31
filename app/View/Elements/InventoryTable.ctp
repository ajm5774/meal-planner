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
$headers = $this->Html->tableHeaders(array('Item', 'Quantity', 'Unit'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = '';

foreach($inventory as $index => $item)
{
	$tableRow = '';
	foreach(array('ingredient_id', 'quantity', 'unit') as $field)
		$tableRow .= $this->Html->tag('td', $item[$field], array('id' => $item['id'] . '.' . $field . '.' . 'Col'));

	$tableCells .= $this->Html->tag('tr', $tableRow, array('id' => $item['id'] . '.' . $field . '.' . 'Row'));
}
$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRow', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRow', 'class' => 'delete_row'));

$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'invTable', 'class' => 'display'));

$form = $this->Form->create('users', array('id' => 'formAddNewRow', 'title' => 'Add Inventory Item'));
$form .= $this->Form->input('ingredient_id', array('id' => 'ingredient_id', 'name' => 'ingredient_id', 'rel' => '0', 'div' => false, 'options' => $ingredients, 'type' => 'select')) . '<br>';
$form .= $this->Form->input('quantity', array('id' => 'quantity', 'name' => 'quantity', 'rel' => '1', 'div' => false, 'default' => 1)) . '<br>';
$form .= $this->Form->input('unit', array('id' => 'unit', 'name' => 'unit', 'rel' => '2', 'div' => false, 'options' => $units)) . '<br>';
$form .= $this->Form->end();
$element .= $form;
echo $this->Html->div('', $element, $options);
//debug($form);

?>
<script>
$(document).ready( function () {
    $('#invTable').dataTable().makeEditable({
        sUpdateURL: "/Inventories/datatableEdit",
        sAddURL: "/Inventories/datatableAdd",
        sDeleteURL: "/Inventories/datatableDelete",
        "aoColumns": [
                      {
                    	  type: 'select',
                       data: '<?php echo json_encode($ingredients);?>',
                          onblur: 'submit',
                          oUpdateParameters:{
                              field: 'ingredient_id',}
                      },
                      {
                    	  onblur: 'submit',
                    	  oUpdateParameters:{
                              field: 'quantity',}
                      },
                      {
                    	  type: 'select',
                       data: '<?php echo json_encode($units);?>',
                          onblur: 'submit',
                          oUpdateParameters:{
                              field: 'unit',}
                      }
              ]});
} );

$(document).ready(function(){$( "button" ).button()});

</script>