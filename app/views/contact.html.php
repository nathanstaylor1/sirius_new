<div class = "back-image right"></div>
<div class = "container page">
	<div class ='row'>
		<div class = "col-md-6">
			<h3> Contact Information </h3>

			<ul id = "contact-info">
				<li><span class = "glyphicon glyphicon-earphone"></span> 0438 123 456</li>
				<li><span class = "glyphicon glyphicon-envelope"></span> dianne@siriusbusiness.com.au</li>
				<li><span class = "glyphicon glyphicon-"></span> other contact??</li>
				<li><span class = "glyphicon glyphicon-"></span> social media??</li>
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

