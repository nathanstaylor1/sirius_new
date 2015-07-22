<div class = "container page resources">
	<?php if (isset($message)){ ?>
		<p class = "error message"> <?php echo $message ?>
	<? }; ?>
	<?php if (isset($test)){ ?>
		<p class = "error message"> test message: <?php echo $test ?>
	<? }; ?>
	<h3> Edit Resources: </h3>
	<p class = "slab"> Please select which resource you want to edit: </p>

	<table class = "links">
		<tr>
			<td class = "slab"><a href = "<?php echo site_url() ?>resources/admin/new"><span>ADD</span></a></td>
			<td class = "slab color"><a href = "<?php echo site_url() ?>resources/admin/edit"><span>EDIT</span></a></td>
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

	<ul id = "link-list" class = "resource-list">

	  <?php foreach($files['links'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable show">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable">
						<form id = "edit-form" action="edit" method="POST">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["description"] ?></textarea></td>
							 	</tr>	
							 	<tr>
									<td><label>URL </label></td>
							 		<td><input type="text" name="url" value = "<?php echo $resource["url"] ?>" ></td>
							 	</tr>		 	
							 	<tr>
							 		<input type="hidden" name="type" value = "links" >
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><input class = "submit" type="submit" value="Update"></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>						</div>
					</div>
				</div>			
			</div>
		</li>

	  <?php endforeach;?>

	</ul>


	<ul id = "tool-list" class = "resource-list">

		<?php foreach($files['tools'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable show">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable">
						<form id = "edit-form" action="edit" method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["description"] ?></textarea></td>
							 	</tr>		
							 	<tr>
							 		<td><label>File </label></td>
			 						<td><input type="file" name="file" id="file"></td>
							 	</tr>	
							 	<tr>
							 		<td></td>
							 		<td><label>If no file is chosen existing file will be used</label></td>
							 	</tr>		 	
							 	<tr>
							 		<input type="hidden" name="type" value = "tools" >
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><input class = "submit" type="submit" value="Update"></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>						</div>
					</div>
				</div>

			</div>
		</li>

	  <?php endforeach;?>

	</ul>

	<ul id = "article-list" class = "resource-list">

		<?php foreach($files['articles'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable show">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable">
						<form id = "edit-form" action="edit" method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["description"] ?></textarea></td>
							 	</tr>		
							 	<tr>
							 		<td><label>File </label></td>
			 						<td><input type="file" name="file" id="file"></td>
							 	</tr>	
							 	<tr>
							 		<td></td>
							 		<td><label>If no file is chosen existing file will be used</label></td>
							 	</tr>		 	
							 	<tr>
							 		<input type="hidden" name="type" value = "articles" >
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><input class = "submit" type="submit" value="Update"></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>						</div>
					</div>
				</div>

			</div>
		</li>

	  <?php endforeach;?>

	</ul>


</div>
