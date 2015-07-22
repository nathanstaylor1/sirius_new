<div class = "container page resources">
	<?php if (isset($message)){ ?>
		<p class = "success message"> <?php echo $message ?>
	<? }; ?>
	<h3> Edit Resources: </h3>
	<p class = "slab"> What did you want to do? </p>

	<table class = "links">
		<tr>
			<td id = "display-btn-add" class = "slab"><a href = "<?php echo site_url() ?>resources/admin/new">ADD</a></td>
			<td id = "display-btn-edit" class = "slab"><a href = "<?php echo site_url() ?>resources/admin/edit">EDIT</a></td>
			<td id = "display-btn-delete" class = "slab"><a href = "<?php echo site_url() ?>resources/admin/delete">DELETE</a></td>
		</tr>
	</table>


</div>
