<div class = "container page resources">
	<?php if (isset($message)){ ?>
		<p class = "error message"> <?php echo $message ?>
	<? }; ?>
	<h3> Edit Resources: </h3>
	<p class = "slab"> Please select which resource you want to add: </p>

	<table class = "links">
		<tr>
			<td class = "slab color"><a href = "<?php echo site_url() ?>resources/admin/new"><span>ADD</span></a></td>
			<td class = "slab "><a href = "<?php echo site_url() ?>resources/admin/edit"><span>EDIT</span></a></td>
			<td class = "slab"><a href = "<?php echo site_url() ?>resources/admin/delete"><span>DELETE</span></a></td>
		</tr>
	</table>

	<table class = "links">
		<tr>
			<td id = "display-btn-links" class = "slab">LINKS</td>
			<td id = "display-btn-tools" class = "slab">TOOLS</td>
			<td id = "display-btn-articles" class = "slab">ARTICLES</td>
		</tr>
	</table>

	<div id = "link-list" class = "resource-list">
		<form id = "link-new-form" action="new" method="POST">
			<h3> New Link: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['link-title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['link-description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>URL </label></td>
			 		<td><input type="text" name="url" value = "<?php echo $postdata['link-url'] ?>" ></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "links" >
			 		<td><input class = "submit" type="submit" value="Publish"></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>


	<div id = "tool-list" class = "resource-list">
		<form id = "tool-new-form" action="new" method="POST" enctype="multipart/form-data">
			<h3> New Tool: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['tool-title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['tool-description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>File </label></td>
			 		<td><input type="file" name="file" id="file"></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "tools" >
			 		<td><input class = "submit" type="submit" value="Publish"></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>

	<div id = "article-list" class = "resource-list">
		<form id = "article-new-form" action="new" method="POST" enctype="multipart/form-data">
			<h3> New Article: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['article-title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['article-description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>File </label></td>
			 		<td><input type="file" name="file" id="file"></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "articles" >
			 		<td><input class = "submit" type="submit" value="Publish"></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>


</div>
