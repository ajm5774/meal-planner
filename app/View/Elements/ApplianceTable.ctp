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
	$options = array();
$element = '';
$headers = $this->Html->tableHeaders(array('Appliances'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = '';

foreach($appliances as $index => $theModel)
{
	$item = $theModel['UserAppliance'];
	$tableRow = '';
	foreach(array('app_id') as $field)
		$tableRow .= $this->Html->tag('td', $item[$field], array('id' => $item['id'] . '.' . $field . '.' . 'Col'));

	$tableCells .= $this->Html->tag('tr', $tableRow, array('id' => $item['id'] . '.' . $field . '.' . 'Row'));
}
$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRowApps', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRowApps', 'class' => 'delete_row'));

$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'appTable', 'class' => 'display'));

$form = $this->Form->create('users', array('id' => 'formAddNewRowApps', 'title' => 'Add Appliance'));
$form .= $this->Form->input('app_id', array('id' => 'app_id', 'name' => 'app_id','label' => 'Name', 'rel' => '0', 'div' => false, 'options' => $allAppliances, 'type' => 'select')) . '<br>';
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
        sAddNewRowFormId: "formAddNewRowApps",
        sAddNewRowButtonId: "btnAddNewRowApps",
        sDeleteRowButtonId: "btnDeleteRowApps",
        sAddNewRowOkButtonId: "btnAddNewAppOK",
        sAddNewRowCancelButtonId: "btnAddNewAppCancel",
        "aoColumns": [
                      {
                    	  type: 'select',
                       data: '<?php echo json_encode($allAppliances);?>',
                          onblur: 'submit',
                          oUpdateParameters:{
                              field: 'app_id',}
                      },
              ]});
} );

$(document).ready(function(){$( "button" ).button();});

$(document).click(function(){
	$('button:disabled').addClass('ui-state-disabled');
	$('button.ui-state-disabled:enabled').removeClass('ui-state-disabled');
});
</script>