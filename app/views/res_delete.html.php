<div class = "container page resources">
	<?php if (isset($message)){ ?>
		<p class = "error message"> <?php echo $message ?>
	<? }; ?>
	<h3> Edit Resources: </h3>

	<p class = "slab"> Please select which resource you want to delete: </p>

	<table class = "links">
		<tr>
			<td class = "slab"><a href = "<?php echo site_url() ?>resources/admin/new"><span>ADD</span></a></td>
			<td class = "slab "><a href = "<?php echo site_url() ?>resources/admin/edit"><span>EDIT</span></a></td>
			<td class = "slab color"><a href = "<?php echo site_url() ?>resources/admin/delete"><span>DELETE</span></a></td>
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
				<div class = "row flexbox">
					<div class = "col-md-12 flex3">
						<a href="http://<?php echo $resource["url"] ?>" target="_blank"><h4><?php echo $resource["title"]?></h4></a>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<form id = "delete-form" action="delete" method="POST">
							   <input type="hidden" name="title" value = "<?php echo $resource["title"] ?>" >								
							   <input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							   <input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							   <input class = "submit" type="submit" value = "Delete" >
							</form>
						</div>
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
				<div class = "row flexbox">
					<div class = "col-md-12 flex3">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<form id = "delete-form" action="delete" method="POST">
							   <input type="hidden" name="title" value = "<?php echo $resource["title"] ?>" >
							   <input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							   <input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							   <input class = "submit" type="submit" value = "Delete" >
							</form>
						</div>
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
				<div class = "row flexbox">
					<div class = "col-md-12 flex3">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<form id = "delete-form" action="delete" method="POST">
							   <input type="hidden" name="title" value = "<?php echo $resource["title"] ?>" >								
							   <input type="hidden" name="docspath" value = "<?php echo $resource["docspath"] ?>" >
							   <input type="hidden" name="filespath" value = "<?php echo $resource["filespath"] ?>" >
							   <input class = "submit" type="submit" value = "Delete" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</li>

	  <?php endforeach;?>

	</ul>


</div>
