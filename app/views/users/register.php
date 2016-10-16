<?php if($this->session->flashdata('captcha_incorrect')) :	?>
	<p class="alert alert-dismissable alert-danger"> <?php echo $this->session->flashdata('captcha_incorrect'); ?></p>
	<?php endif; ?>

	<?php if(!$this->session->userdata('logged_in')) : ?>

<h1 style="padding-top: 40px;">Register</h1>
<p>Please fill in the form below to create an account</p>
<!--	Display Errors 	-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php echo form_open('users/register'); ?>
<!--	Field: First Name 	-->
<p>
<?php echo form_label('First name:'); ?>
<?php
$data = array(
				'name' 	=> 'first_name',
				'value' => set_value('first_name')
			);
?>
<?php echo form_input($data);	?>
</p>
<!--	Field: Last Name 	-->
<p>
<?php echo form_label('Last name:'); ?>
<?php
$data = array(
				'name' 	=> 'last_name',
				'value' => set_value('last_name')
			);
?>
<?php echo form_input($data);	?>
</p>
<!--	Field: Email Address 	-->
<p>
<?php echo form_label('Email ID:'); ?>
<?php
$data = array(
				'name' 	=> 'email',
				'value' => set_value('email')
			);
?>
<?php echo form_input($data);	?>
</p>
<!--	Field: Username 	-->
<p>
<?php echo form_label('Username:'); ?>
<?php
$data = array(
				'name' 	=> 'username',
				'value' => set_value('username')
			);
?>
<?php echo form_input($data);	?>
</p>
<!--	Field: Password 	-->
<p>
<?php echo form_label('Password:'); ?>
<?php
$data = array(
				'name' 	=> 'password',
				'value' => set_value('password')
			);
?>
<?php echo form_password($data);	?>
</p>
<!--	Field: Confirm Password	-->
<p>
<?php echo form_label('Confirm Password:'); ?>
<?php
$data = array(
				'name' 	=> 'password2',
				'value' => set_value('password2')
			);
?>
<?php echo form_password($data);	?>
</p>

	<!-- Captcha Verification -->
<p>

	<?php echo form_label('Enter the Characters correctly: '); ?>
	<!-- <?=$captcha?> --> <?php echo $captcha; ?> <br/> 
	<?php 
		$data = array(
				'name'=> 'captcha'
			);
		echo form_input($data);	
	?>
</p>
<!--	Submit button 	-->
<p>
<?php
$data = array(
				"name" 	=> "submit",
				"value" => "Register",
				"class"	=>	"btn btn-primary"
			);
?>
<?php echo form_submit($data);	?>
</p>
<?php echo form_close();	?>

<?php else : ?>
	<p class="alert alert-dismissable alert-danger"> <?php echo $this->session->flashdata('registered'); 
	redirect('home/index');
	?></p>
<?php endif; ?>