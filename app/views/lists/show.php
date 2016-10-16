<ul id="actions">
	<h4>List Actions</h4>
	<li><a href="<?php echo base_url();?>tasks/add/<?php echo $list->id; ?>">Add Task</a></li>
	<li><a href="<?php echo base_url();?>lists/edit/<?php echo $list->id; ?>">Edit List</a></li>
	<li><a onclick="return confirm('Are you sure?')" href="<?php echo base_url();?>lists/delete/<?php echo $list->id; ?>">Delete List</a></li>
</ul>

<h1> <?php echo $list->list_name; ?> </h1>

<?php if($this->session->flashdata('task_deleted')) :	?>
	<p class="alert alert-dismissable alert-danger"> <?php echo $this->session->flashdata('task_deleted'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('task_created')) :	?>
	<p class="alert alert-dismissable alert-success"> <?php echo $this->session->flashdata('task_created'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('task_updated')) :	?>
		<p class="alert alert-dismissable alert-success"> <?php echo $this->session->flashdata('task_updated'); ?></p>
	<?php endif; ?>
	<?php if($this->session->flashdata('marked_complete')) :	?>
		<p class="alert alert-dismissable alert-success"> <?php echo $this->session->flashdata('marked_complete'); ?></p>
	<?php endif; ?><?php if($this->session->flashdata('marked_new')) :	?>
		<p class="alert alert-dismissable alert-success"> <?php echo $this->session->flashdata('marked_new'); ?></p>
	<?php endif; ?>

Created On: <strong> <?php echo date("n-j-Y",strtotime($list->create_date)); ?></strong>
<br/><br/>
<div style="max-width:500px;"><?php echo $list->list_body; ?> </div>
<br/><br/>
<h4>Incomplete Tasks</h4>
<!--	Getting a list of incomplete tasks	-->
<?php if($incomplete_tasks) : ?>
	<ul>
		<?php foreach($incomplete_tasks as $task) : ?>
		<li><a href="<?php echo base_url();?>tasks/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php else : ?>
		<p>There are no Pending tasks</p>
<?php endif; ?>
<br/>
<h4>Complete Tasks</h4>
<!--	Getting a list of Incomplete tasks	-->
<?php if($completed_tasks) : ?>
	<ul>
		<?php foreach($completed_tasks as $task) : ?>
		<li><a href="<?php echo base_url();?>tasks/show/<?php echo $task->task_id; ?>"><?php echo $task->task_name; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php else : ?>
		<p>There are no Current tasks</p>
<?php endif; ?>
<br/>



