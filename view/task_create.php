<h1>Add Tasks</h1>
<form class="form-horizontal" action="/task/doCreate" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="title">Title</label>
		  <div class="col-md-4">
		  	<input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="required">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="description">Description</label>
		  <div class="col-md-4">
		  	<textarea rows="4" cols="50" id="description" name="description" placeholder="Description" class="form-control input-md" required="required"></textarea>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="due_date">Due Date</label>
		  <div class="col-md-4">
		  	<input id="due_date" name="due_date" type="date" class="form-control input-md" required="required">
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
