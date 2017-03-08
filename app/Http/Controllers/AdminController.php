<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\ContactMessage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    //get post and pages of post
    public function getIndex() {
        $contactMessages = ContactMessage::paginate(5);
        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.index', ['posts' => $posts, 'contactMessages' => $contactMessages]);
    }

    public function getLogin() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|max:60',
            'password' => 'required|min:5'
        ]);
        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->back()->with(['fail' => 'Password or email not correct.']);
        }
        return redirect()->route('admin.index')->with(['success' => 'thank you for login']);
    }

    public function getLogOut() {
        Auth::logout();
        return redirect()->route('blog.index');
    }

}
