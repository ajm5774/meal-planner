<?php
/**
 * $inventory should be in the form:
 * array('milk' => array(3, 'gal'), 'chicken breast' => array(6, 'oz'))
 *
 */
if(!isset($inventory))
	$inventory = $this->requestAction ('/users/inventory');

if(empty($inventory))
	$inventory = array(array('Chicken Breast', 5, '0z'), array('Chicken Thighs', 10, '0z'));

$headers = $this->Html->tableHeaders(array('Item', 'Quantity', 'Unit'));

$tableCells = $this->Html->tableCells($inventory);

echo $this->html->tag('table', $headers . $tableCells, array('id' => 'invTable'));

?>

<script>

$(document).ready( function () {
    $('#invTable').dataTable( {
    "sScrollY": "200px",
    "bPaginate": false
    } ).makeEditable();
} );

</script>