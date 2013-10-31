<?php

//if the $inventory variable didnt get passed into the element then request the data from the controller
if(!isset($appliances))
{
	$data = $this->requestAction ('/UserAppliances/edit');
	$appliances = $data[0];
	$allAppliances = $data[1];
}

//for testing
if(empty($appliances))
	$appliances = array();

if(empty($options))
	$options = array('id' => 'sidebar');
$element = '';
$headers = $this->Html->tableHeaders(array('Id', 'Name'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = '';

foreach($appliances as $index => $theModel)
{
	$item = $theModel['UserAppliance'];
	$tableRow = '';
	foreach(array('id', 'app_id') as $field)
		$tableRow .= $this->Html->tag('td', $item[$field], array('id' => $item['id'] . '.' . $field . '.' . 'Col'));

	$tableCells .= $this->Html->tag('tr', $tableRow, array('id' => $item['id'] . '.' . $field . '.' . 'Row'));
}
$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRow', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRow', 'class' => 'delete_row'));

$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'appTable', 'class' => 'display'));

$form = $this->Form->create('users', array('id' => 'formAddNewRow', 'title' => 'Add Appliance'));
$form .= $this->Form->input('id', array('id' => 'id', 'name' => 'id','label' => false, 'rel' => '0', 'div' => false, 'type' => 'hidden')) . '<br>';
$form .= $this->Form->input('app_id', array('id' => 'app_id', 'name' => 'app_id','label' => 'Name', 'rel' => '1', 'div' => false, 'options' => $allAppliances, 'type' => 'select')) . '<br>';
$form .= $this->Form->end();
$element .= $form;
echo $this->Html->div('', $element, $options);
//debug($form);

?>
<script>
$(document).ready( function () {
    $('#appTable').dataTable().makeEditable({
        sUpdateURL: "/UserAppliances/datatableEdit",
        sAddURL: "/UserAppliances/datatableAdd",
        sDeleteURL: "/UserAppliances/datatableDelete",
        "aoColumns": [
                      {},
                      {
                    	  type: 'select',
                       data: '<?php echo json_encode($allAppliances);?>',
                          onblur: 'submit',
                          oUpdateParameters:{
                              field: 'app_id',}
                      },
              ]});
} );

$(document).ready(function(){$( "button" ).button()});

</script>