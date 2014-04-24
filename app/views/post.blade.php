<div class="post container">
	<h2><a href="/post/{{ $post->id }}" >{{ $post->title }}</a></h2>
	<article>
	{{ $post->content }}	
	</article>
	@if(Auth::check()) 
		<a href="{{ action('PostController@edit', $post->id) }}" class="btn btn-info">
			<span class="glyphicon glyphicon-pencil" ></span> Edit
		</a>
		<a href="{{ action('PostController@delete', $post->id) }}" class="btn btn-warning">
			<span class="glyphicon glyphicon-fire"></span> Destroy this blasphemy!
		</a>
	@endif
</div> <!--div post-->
<hr />
