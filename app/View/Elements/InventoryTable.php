<?php
/**
 * $inventory should be in the form:
 * array('milk' => array(3, 'gal'), 'chicken breast' => array(6, 'oz'))
 *
 */
if(!isset($inventory))
	$inventory = $this->requestAction ('/users/inventory');

$headers = $this->Html->tableHeaders('Item', 'Quantity', 'Unit');

$tableCells = $this->Html->tableCells($inventory);

echo $this->html->table($headers . $tableCells, array('id' => 'invTable'));

?>

<script>

$(document).ready( function () {
    $('#invTable').dataTable( {
    "sScrollY": "200px",
    "bPaginate": false
    } ).makeEditable();
} );

</script>