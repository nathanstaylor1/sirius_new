<div class = "container page resources">
	<?php if (isset($error)){ ?>
		<p class = "error message"> <?php echo $error ?>
	<? }; ?>
	<h3> Login: </h3>
	<form id = "login-form" action="login" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label>Name: </label></td>
		 		<td><input type="text" name = "username"></td>
		 	</tr>
		 	<tr>
		 		<td><label>Password: </label></td>
		 		<td><input type ="password" name = "password"></td>
		 	</tr>
		 	<tr>
		 		<td><input class = "submit-button" type="submit" value="Login"></td>
		 		<td></td>
			</tr>

		</table>
	</form>
</div>
