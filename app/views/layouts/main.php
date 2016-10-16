<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"	/>
	<title>myTodo Task Manager - Home </title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body background="<?php echo base_url();?>assets/img/bg.png">
	<div class="navbar navbar-inverse navbar-fixed-top" >
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="<?php echo base_url();?>">myTodo</a>
				
				<div class="nav-collapse collapse">
					<p class="navbar-text pull-right">
						<!--RIGHT TOP CONTENT -->
						<?php if($this->session->userdata('logged_in')) : ?>
					<a href="<?php echo base_url();?>lists/index/">My Lists </a>
					<?php else : ?>
					<a href="<?php echo base_url();?>users/register">Register</a>
						<?php endif; ?>
						<?php if($this->session->userdata('logged_in')) : ?>
							|
							<strong color="white">Welcome <?php echo $this->session->userdata('username'); ?> </strong>
					<?php endif; ?>	
					
							
					</p>
					<ul class="nav">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						
					</ul>
				</div>	<!--/.nav collapse-->
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="well sidebar-nav">
					<div style="margin: 0 0 10 10; padding-top: 25px;">
						<!-- SIDEBAR CONTENT 	-->
						<?php if($this->session->userdata('logged_in')) : ?>
								<p>You are logged in as <?php echo $this->session->userdata('username'); ?></p>
						<!-- Start Form -->
						<?php $attributes = array(
								'id' => 'logout_form',
								'class' => 'form-horizontal'
							);
						?>
						<?php echo form_open('users/logout',$attributes); ?>
						<!-- Submit Button -->
						<?php $data = array(
							"value" => "Logout",
							"name" => "submit",
							"class" => "btn btn-prinary"
						);
						?>
						<?php echo form_submit($data); ?>
						<?php echo form_close(); ?>

						<?php else: ?>
						<h3 align="center"> Log In </h4>
						<?php $this->load->view('users/login');	?>
						<?php endif; ?>
					</div>
				</div>	<!-- well-->
			</div>	<!-- Span 	-->

			<div class="span9" style="padding-top: 50px;">
				<!--	Main Content 	-->
				<?php $this->load->view($main_content);	?>
					
			</div>	<!--	Span 	-->
		</div> <!--	Row 	-->
		<hr>

		<!-- <footer>
			<p>&copy; Premangshu Chanda. Copyright 2016 </p>
		</footer>  -->
		<footer>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6  col-xs-offset-2 col-md-offset-0 col-sm-offset-0"> <!-- text-center -->
                    <div class="footer_logo">
                        <p>
                    </div>
                </div>
                <div class="col-md-6 col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-offset-0">
                    
                    <div class="copyright_text">
                        <p>&copy; Premangshu Chanda. Copyright 2016  All Rights Reserved </p>
                        
                    </div>

                </div> 

            </div>
        </div>
       
    
</footer>

	</div> <!-- Fluid -->
</body>
</html>




