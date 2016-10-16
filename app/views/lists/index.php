<h1>Current List: </h1>

<?php if($this->session->flashdata('list_created')) : ?>
	<?php echo '<p class="text-success">'.$this->session->flashdata('list_created').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_deleted')) : ?>
	<?php echo '<p class="text-success">'.$this->session->flashdata('list_deleted').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_updated')) : ?>
	<?php echo '<p class="text-success">'.$this->session->flashdata('list_updated').'</p>'; ?>
<?php endif; ?>

<p>Your Current List: </p>
<ul>
<?php foreach($lists as $list) : ?>
	<li>
		<div class="list_name"><a href="<?php echo base_url();?>lists/show/<?php echo $list->id;?>"> <?php echo $list->list_name ?></a></div>
		<div class="list_body"> <?php echo $list->list_body ?> </div>
	</li>
<?php endforeach; ?>
</ul>
<br/>
<p><a href="<?php echo base_url();?>lists/add">Create New List</a></p>