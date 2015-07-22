<div class = "container page resources">
	<?php if ($error != ""){ ?>
		<p class = "error message"> <?php echo $error ?>
	<? }; ?>
	<?php if ($message != ""){ ?>
		<p class = "success message"> <?php echo $message ?>
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
			<td id = "display-btn-links" class = "slab <?php if($postdata['links']['active']) echo 'color' ?>">LINKS</td>
			<td id = "display-btn-tools" class = "slab <?php if($postdata['tools']['active']) echo 'color' ?>">TOOLS</td>
			<td id = "display-btn-articles" class = "slab <?php if($postdata['articles']['active']) echo 'color' ?>">ARTICLES</td>
		</tr>
	</table>

	<ul id = "link-list" class = "resource-list <?php if($postdata['links']['active']) echo 'active' ?>">

	  <?php foreach($files['links'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<form id = "edit-form" action="edit" method="POST">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["id"] == $postdata['activeid']? $postdata['links']["title"] : $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["id"] == $postdata['activeid']? $postdata['links']["description"] : $resource["description"] ?></textarea></td>
							 	</tr>	
							 	<tr>
									<td><label>URL </label></td>
							 		<td><input type="text" name="url" value = "<?php echo $resource["id"] == $postdata['activeid']? $postdata['links']["url"] : $resource["url"] ?>" ></td>
							 	</tr>		 	
							 	<tr>
							 		<input type="hidden" name="type" value = "links" >
							 		<input type="hidden" name="id" value = "<?php echo $resource["id"] ?>" >
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-pencil"></span> Update</button></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>
						</div>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "hide-button"><span class = "glyphicon glyphicon-collapse-up"></span>Hide</span>
						</div>
					</div>
				</div>			
			</div>
		</li>

	  <?php endforeach;?>

	</ul>


	<ul id = "tool-list" class = "resource-list <?php if($postdata['tools']['active']) echo 'active' ?>">

		<?php foreach($files['tools'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<form id = "edit-form" action="edit" method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["id"] == $postdata['activeid']? $postdata['tools']["title"] : $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["id"] == $postdata['activeid']? $postdata['tools']["description"] : $resource["description"] ?></textarea></td>
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
							 		<input type="hidden" name="id" value = "<?php echo $resource["id"] ?>" >							 		
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-pencil"></span> Update</button></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>
						</div>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "hide-button"><span class = "glyphicon glyphicon-collapse-up"></span>Hide</span>
						</div>
					</div>
				</div>

			</div>
		</li>

	  <?php endforeach;?>

	</ul>

	<ul id = "article-list" class = "resource-list <?php if($postdata['articles']['active']) echo 'active' ?>">

		<?php foreach($files['articles'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "row flexbox <?php echo $resource["id"] ?>">
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-12 flex3 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<form id = "edit-form" action="edit" method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<td><label>Title: </label></td>
							 		<td><input type="text" name="title" value = "<?php echo $resource["id"] == $postdata['activeid']? $postdata['articles']["title"] : $resource["title"] ?>" ></td>
							 	</tr>
							 	<tr>
									<td><label>Description: </label></td>
							 		<td><textarea name="description" rows="10" cols="50"><?php echo $resource["id"] == $postdata['activeid']? $postdata['articles']["description"] : $resource["description"] ?></textarea></td>
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
							 		<input type="hidden" name="id" value = "<?php echo $resource["id"] ?>" >							 		
							 		<input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							  		<input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							 		<td><button class = "submit-button" type="submit"><span class = "glyphicon glyphicon-pencil"></span> Update</button></td>
							 		<td></td>
							 	</tr>
							 </table>
						</form>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] != $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "edit-button"><span class = "glyphicon glyphicon-edit"></span>Edit</span>
						</div>
					</div>
					<div class = "col-md-2 flex1 hideable <?php if ($resource["id"] == $postdata['activeid']) echo 'show'?>">
						<div class = "link-holder">
							<span id = "<?php echo $resource["id"] ?>" class = "hide-button"><span class = "glyphicon glyphicon-collapse-up"></span>Hide</span>
						</div>
					</div>
				</div>

			</div>
		</li>

	  <?php endforeach;?>

	</ul>


</div>
