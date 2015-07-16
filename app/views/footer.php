<footer class = "footer">
	<div class = "container">
		<div class="row">
		  <div class="col-md-12">
			  <ul id = "site-map"class = "text-center">
			  	<a href="<?php echo site_url() ?>"><li >Home</li></a>
		        <a href="<?php echo site_url() ?>about/"><li >About</li></a>
		        <a href="<?php echo site_url() ?>individuals/"><li >Individuals</li></a>
		        <a href="<?php echo site_url() ?>companies/"><li >Companies</li></a>
		        <a href="<?php echo site_url() ?>boards/"><li >Boards</li></a>
		        <a href="<?php echo site_url() ?>resources/"><li >Resources</li></a>
		        <a href="<?php echo site_url() ?>contact/"><li >Contact</li></a>
			  </ul>
		  </div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">

		  </div>
		  <div class="col-md-4">

		  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Have a question?</button>

		  </div>
		  <div class="col-md-4">
				<h4 id = "copyright">
				&copy; <?php 
				date_default_timezone_set("Australia/Melbourne");
				echo date("Y")
				?> Sirius Business
				</h4>


		  </div>
		</div>
		<br>
		
	</div>
</footer>