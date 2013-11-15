<?php

//if the $appliances variable didnt get passed into the element then request the data from the controller
if(!isset($appliances))
{
	$data = $this->requestAction ('/UserRecipes/edit/1');
	$recipes = $data[0];
	$allRecipes = $data[1];
}

//for testing
if(empty($appliances))
	$appliances = array();

if(empty($options))
	$options = array();
$element = '';
$headers = $this->Html->tableHeaders(array('Favorite Recipes'));
$headers = $this->Html->tag('thead', $headers);
$tableCells = '';

foreach($recipes as $index => $theModel)
{
	$item = $theModel['UserRecipe'];
	$tableRow = '';
	foreach(array('recipe_id') as $field)
		$tableRow .= $this->Html->tag('td', $item[$field], array('id' => $item['id'] . '.' . $field . '.' . 'Col'));

	$tableCells .= $this->Html->tag('tr', $tableRow, array('id' => $item['id'] . '.' . $field . '.' . 'Row'));
}
$element .= $this->Html->tag('button', 'Add', array('id'=>'btnAddNewRowFavs', 'class' => 'add_row'));
$element .= $this->Html->tag('button', 'Delete', array('id'=>'btnDeleteRowFavs', 'class' => 'delete_row'));

$element .= $this->html->tag('table', $headers . $tableCells, array('id' => 'favoritesTable', 'class' => 'display'));

$form = $this->Form->create('users', array('id' => 'formAddNewRowFavs', 'title' => 'Add Recipe to Favorites'));
$form .= $this->Form->input('recipe_id', array('id' => 'recipe_id', 'name' => 'recipe_id','label' => 'Name', 'rel' => '0', 'div' => false, 'options' => $allRecipes, 'type' => 'select')) . '<br>';
$form .= $this->Form->input('opinion', array('id' => 'opinion', 'name' => 'opinion','label' => false, 'div' => false,'type' => 'hidden', 'value' => 1)) . '<br>';
$form .= $this->Form->end();
$element .= $form;
echo $this->Html->div('', $element, $options);
//debug($form);

?>
<script>
$(document).ready( function () {
    $('#favoritesTable').dataTable().makeEditable({
        sUpdateURL: "/UserRecipes/datatableEdit",
        sAddURL: "/UserRecipes/datatableAdd",
        sDeleteURL: "/UserRecipes/datatableDelete",
        sAddNewRowFormId: "formAddNewRowFavs",
        sAddNewRowButtonId: "btnAddNewRowFavs",
        sDeleteRowButtonId: "btnDeleteRowFavs",
        sAddNewRowOkButtonId: "btnAddNewFavOK",
        sAddNewRowCancelButtonId: "btnAddNewFavCancel",
        "aoColumns": [
                      {
                    	  type: 'select',
                       data: '<?php echo json_encode($allRecipes);?>',
                          onblur: 'submit',
                          oUpdateParameters:{
                              field: 'recipe_id',}
                      },
              ]});
} );

$(document).ready(function(){$( "button" ).button();});

$(document).click(function(){
	$('button:disabled').addClass('ui-state-disabled');
	$('button.ui-state-disabled:enabled').removeClass('ui-state-disabled');
});
</script>