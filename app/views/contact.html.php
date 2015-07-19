<div class = "back-image right"></div>
<div class = "container page">
	<div class ='row'>
		<div class = "col-md-6">
			<h3> Contact Information </h3>

			<ul id = "contact-info">
				<li><span class = "glyphicon glyphicon-earphone"></span> 1300 922 911</li>
				<li><span class = "glyphicon glyphicon-phone"></span> 0438 735 865</li>
				<li><i class="fa fa-inbox"></i> dtaylor@siriusbusiness.com.au</li>
				<li><i class="fa fa-building-o"></i> 1/459 Toorak Road, Toorak, 3142, Victoria, Australia</li>
				<li><span class = "glyphicon glyphicon-envelope"></span> PO Box 1174, Hartwell, 3124, Victoria, Australia</li>
				<li><i class="fa fa-skype"></i> dianne.l.taylor</li>

			</ul>
		</div>
		<div class = "col-md-6">
			<form id = "contact-form" action="mail" method="POST">
				<div id = "errors">
					<p><?php echo $error ?></p>
				</div>
	           <div class="form-group">
	            <label for="name">Name:</label>
	            <input type="name" class="form-control" id="pwd">
	          </div>
	          <div class="form-group">
	            <label for="email">Email address:</label>
	            <input type="email" class="form-control" id="email">
	          </div>
	            <div class="form-group">
	            <label for="query">Query:</label>
	            <textarea class="form-control" rows="10" id="query"></textarea>
	          </div>
	          <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	    </div>
		
	</div>
</div>

