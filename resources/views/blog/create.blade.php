<h2>Add New Post</h2>
<form method="POST" action="/blog">
	<input type="text" name="title"><br>
	{{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
	<textarea name="description" rows="8" cols="40"></textarea><br>
	{{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" name="name" value="post">
</form>
