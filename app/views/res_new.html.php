<div class = "container page resources">
	<?php if ($error != ""){ ?>
		<p class = "error message"> <?php echo $error ?>
	<? }; ?>
	<?php if ($message != ""){ ?>
		<p class = "success message"> <?php echo $message ?>
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
			<td id = "display-btn-links" class = "slab <?php if($postdata['links']['active']) echo 'color' ?>">LINKS</td>
			<td id = "display-btn-tools" class = "slab <?php if($postdata['tools']['active']) echo 'color' ?>">TOOLS</td>
			<td id = "display-btn-articles" class = "slab <?php if($postdata['articles']['active']) echo 'color' ?>">ARTICLES</td>
		</tr>
	</table>

	<div id = "link-list" class = "resource-list <?php if($postdata['links']['active']) echo 'active' ?>">
		<form id = "link-new-form" action="new" method="POST">
			<h3> New Link: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['links']['title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['links']['description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>URL </label></td>
			 		<td><input type="text" name="url" value = "<?php echo $postdata['links']['url'] ?>" ></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "links" >
			 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-file"></span>Publish</button></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>


	<div id = "tool-list" class = "resource-list <?php if($postdata['tools']['active']) echo 'active' ?>">
		<form id = "tool-new-form" action="new" method="POST" enctype="multipart/form-data">
			<h3> New Tool: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['tools']['title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['tools']['description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>File </label></td>
			 		<td><input type="file" name="file" id="file"></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "tools" >
			 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-file"></span>Publish</button></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>

	<div id = "article-list" class = "resource-list <?php if($postdata['articles']['active']) echo 'active' ?>">
		<form id = "article-new-form" action="new" method="POST" enctype="multipart/form-data">
			<h3> New Article: </h3>
			<table>
				<tr>
					<td><label>Title: </label></td>
			 		<td><input type="text" name="title" value = "<?php echo $postdata['articles']['title'] ?>" ></td>
			 	</tr>
			 	<tr>
					<td><label>Description: </label></td>
			 		<td><textarea name="description" rows="10" cols="80"><?php echo $postdata['articles']['description'] ?></textarea></td>
			 	</tr>	
			 	<tr>
					<td><label>File </label></td>
			 		<td><input type="file" name="file" id="file"></td>
			 	</tr>		 	
			 	<tr>
			 		<input type="hidden" name="type" value = "articles" >
			 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-file"></span>Publish</button></td>
			 		<td></td>
			 	</tr>
			 </table>

		</form>
	</div>


</div>
