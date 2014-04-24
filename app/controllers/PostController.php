<?php 

class PostController extends BaseController {
	public function newPost() {
		$input = Input::all();
		
		$post = new Post;
		$post->title = $input['subject'];
		$post->content = $input['content'];

		$post->foblo_user_id = Auth::user()->id;

		$post->save();
		
		return Redirect::action('HomeController@home');	
	}			

	public function viewPost(Post $post) {
		//return $post;
		$content = View::make('post', compact('post'));
		return View::make('simpleContent', compact('content'));
	}
	
	public function delete(Post $post) {
		return View::make('postDelete', compact('post'));
	}

	public function doDelete() {
		$post = Post::findOrFail(Input::get('id'));
		$post->delete();

		return Redirect::action('HomeController@home');
	}
		
	public function edit(Post $post) {
		return View::make('postEdit', compact('post'));
	}


	public function doEdit() {
		$post = Post::findOrFail(Input::get('id'));	
		$post->title = Input::get('subject');
		$post->content = Input::get('content');
		$post->save();


		return Redirect::action('HomeController@home');
	}
}
