<p>Please fill in the form below to Edit the Task list</p>
<!--	Display Errors 	-->
<?php echo validation_errors('<p class="text-error">'); ?>
<?php echo form_open('lists/edit/'.$this_list->id.''); ?>
<!--	Field: First Name 	-->
<p>
<?php echo form_label('List Name:'); ?>
<?php
$data = array(
				'name' 	=> 'list_name',
				'value' => set_value('list_name')
			);
?>
<?php echo form_input($data);	?>
</p>
<!--	Field: Last Name 	-->
<p>
<?php echo form_label('List Body:'); ?>
<?php
$data = array(
				'name' 	=> 'list_body',
				'value' => set_value('list_body')
			);
?>
<?php echo form_textarea($data);	?>
</p>

<!--	Submit button 	-->
<p>
<?php
$data = array(
				"name" 	=> "submit",
				"value" => "Edit List",
				"class"	=>	"btn btn-primary"
			);
?>
<?php echo form_submit($data);	?>
</p>
<?php echo form_close();	?>