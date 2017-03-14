{{ Session::get('message') }}

<h1>My First Blog</h1>
@foreach($blogs as $blog)
<h2><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></h2>


<p>{{ $blog->description }}</p>
<a href="/blog/{{ $blog->id }}/edit">Edit this Post</a>
<form class="" action="/blog/{{ $blog->id }}" method="post">
	<input type="hidden" name="_method" value="delete" >
	<input type="hidden" name="_token" value="{{ csrf_token() }}" >
	<input type="submit" name="name" value="delete">
</form>
<hr>
@endforeach

{!! $blogs->links() !!}