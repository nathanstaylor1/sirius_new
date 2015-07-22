<div class = "container page resources">
	<h3> Resources </h3>

	<p class = "slab"> Want to explore further? Here are some resources to get you started. </p>

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
				</div>
			</div>
		</li>

	  <?php endforeach;?>

	</ul>


	<ul id = "tool-list" class = "resource-list">

		<?php foreach($files['tools'] as $name => $resource):?>
		<li>
			<div class = "container-fluid">
				<div class = "flexbox">
					<div class = "flex3">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "flex1">
						<div class = "link-holder">
							<a href="<?php echo site_url() . $resource["url"] ?>" class = "download-button" download = "<?php echo str_replace(" ", "_", trim($resource["title"])) . '.' . $resource["ext"] ?>"><span class = "glyphicon glyphicon-download"></span>Download</a>
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
					<div class = "col-md-10 flex3">
						<h4><?php echo $resource["title"]?></h4>
						<p class = "slab"><?php echo $resource["description"]?></p>
					</div>
					<div class = "col-md-2 flex1">
						<div class = "link-holder">
							<a href="<?php echo site_url() . $resource["url"] ?>" class = "download-button" download = "<?php echo str_replace(" ", "_", trim($resource["title"])) . '.' . $resource["ext"] ?>"><span class = "glyphicon glyphicon-download"></span>Download</a>
						</div>
					</div>
				</div>
			</div>
		</li>

	  <?php endforeach;?>

	</ul>


</div>
