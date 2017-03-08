<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller {

    //get post and pages of post
    public function getBlogIndex() {
        $posts = Post::paginate(5);
        foreach ($posts as $post) {
            $post->body = $this->shortText($post->body, 30);
        }
        return view('frontend.blog.index', ['posts' => $posts]);
    }

    public function getSinglePost($post_id) {
        $post=Post::find($post_id);
        if (!$post) {
            return redirect()->route('blog.index');
        }
        return view('frontend.blog.single',['post'=>$post]);
    }

    //posts  action admin area

    public function getCreatePost() {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function postCreatePost(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:200|unique:posts',
            'author' => 'required|max:80',
            'body' => 'required|max:3000',
        ]);
        $post = new Post();
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->save();
        if (strlen($request['categories']) > 0) {
            $categories_ids = explode(',', $request['categories']);
            foreach ($categories_ids as $category_id) {
                $post->categories()->attach($category_id);
            }
        }
// catch categories        
        return redirect()->route('admin.index')->with(['success' => 'Post created successfuly']);
    }

    // show posts
    public function getPosts() {

        $posts = Post::paginate(5);
        foreach ($posts as $post) {
            $post->body = $this->shortText($post->body, 30);
        }
        return view('admin.posts.posts', ['posts' => $posts]);
    }

    public function viewPost($post_id) {
        $post = Post::where('id', $post_id)->first();
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail' => 'Post Not Found :/.']);
        }
        return view('admin.posts.view', ['post' => $post]);
    }

// get post to update
    public function getUpdatePost($post_id) {
        $post = Post::where('id', $post_id)->first();
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail' => 'Post Not Found :/.']);
        }
        $categories = Category::all();
        $post_categories = $post->categories;
        $post_categories_ids = [];
        foreach ($post_categories as $category_post) {
            $post_categories_ids = $category_post->id;
        }
        return view('admin.posts.update', [
            'post' => $post,
            'categories' => $categories,
            'post_categories' => $post_categories,
            'post_categories_ids' => $post_categories_ids]);
    }

    public function postUpdatePost(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:200',
            'author' => 'required|max:80',
            'body' => 'required|max:3000',
        ]);
        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();
        $post->categories->detach();
        if (strlen($request['categories']) > 0) {
            $categories_ids = explode(',', $request['categories']);
            foreach ($categories_ids as $category_id) {
                $post->categories()->attach($category_id);
            }
        }
        return redirect()->route('admin.index')->with(['success' => 'Post Updated']);
    }

    public function getDeletePost($post_id) {
        $post = Post::find($post_id);
        if (!$post) {
            return redirect()->route('admin.index')->with(['fail' => 'Post Not Found :/.']);
        }
        $post->delete();
        return redirect()->route('admin.index')->with(['success' => 'Post Deleted.']);
    }

    private function shortText($text, $word_count) {
        if (str_word_count($text, 0) > $word_count) {

            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$word_count]) . ' ...';
        }
        return $text;
    }

}
