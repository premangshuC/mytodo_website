<br/><br/>
<?php if($this->session->flashdata('login_success')) :	?>


<h3>Latest List </h3>
		<table class="table table-stripped" width="50%" cellspacing="5" cellpadding="5">
			<tr>
			<th>List Name</th>
			<th>Created On</th>
			<th>Views</th>
			</tr>
			<?php if(isset($lists)) : ?>
			<?php foreach($lists as $list) : ?>
			<tr>
				<td><?php echo $list->list_name; ?></td>
				<td><?php echo $list->create_date; ?></td>
				<td><a href="<?php echo base_url();?>lists/show/<?php echo $list->id;?>">View List</a></td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</table>

		<h3>Latest Tasks </h3>
		<table class="table table-stripped" width="50%" cellspacing="5" cellpadding="5">
			<tr>
				<th>Task Name</th>
				<th>List Name</th>
				<th>Created On</th>
				<th>Views</th>
			</tr>
				<?php if(isset($tasks)) : ?>
				<?php foreach($tasks as $task) : ?>
				<tr>
					<td><?php echo $task->task_name; ?></td>
					<td><?php echo $task->list_name; ?></td>
					<td><?php echo $task->create_date; ?></td>
					<td><a href="<?php echo base_url();?>tasks/show/<?php echo $task->id;?>">View Task</a></td>
				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</table>


<?php else : ?>

	<?php if($this->session->flashdata('registered')) :	?>
	<p class="alert alert-dismissable alert-success"> <?php echo $this->session->flashdata('registered'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('no_access')) :	?>
	<p class="alert alert-dismissable alert-danger"> <?php echo $this->session->flashdata('no_access'); ?></p>
	<?php endif; ?>

	<?php if($this->session->flashdata('login_failed')) :	?>
		<p class="alert alert-dismissable alert-danger"> <?php echo $this->session->flashdata('login_failed'); ?></p>
	<?php endif; ?>
	
	<h1 style="padding-top:20px;">Welcome to myTodo!!</h1>
	<p>Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem IpsumLorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum</p>
	<?php if($this->session->userdata('logged_in')) : ?>	
		
		<br/><br/>

		<h3>Latest List </h3>
		<table class="table table-stripped" width="50%" cellspacing="5" cellpadding="5">
			<tr>
			<th>List Name</th>
			<th>Created On</th>
			<th>Views</th>
			</tr>
			<?php if(isset($lists)) : ?>
			<?php foreach($lists as $list) : ?>
			<tr>
				<td><?php echo $list->list_name; ?></td>
				<td><?php echo $list->create_date; ?></td>
				<td><a href="<?php echo base_url();?>lists/show/<?php echo $list->id;?>">View List</a></td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</table>

		<h3>Latest Tasks </h3>
		<table class="table table-stripped" width="50%" cellspacing="5" cellpadding="5">
			<tr>
				<th>Task Name</th>
				<th>List Name</th>
				<th>Created On</th>
				<th>Views</th>
			</tr>
				<?php if(isset($tasks)) : ?>
				<?php foreach($tasks as $task) : ?>
				<tr>
					<td><?php echo $task->task_name; ?></td>
					<td><?php echo $task->list_name; ?></td>
					<td><?php echo $task->create_date; ?></td>
					<td><a href="<?php echo base_url();?>tasks/show/<?php echo $task->id;?>">View Task</a></td>
				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</table>

 
			 <?php endif; ?>
		<?php endif; ?>

	<br/>


<!-- home/index -->