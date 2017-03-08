<?php

namespace App\Http\Controllers;

//use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller {

    public function getCategoryIndex() {
        $categories = Category::paginate(5);
        return view('admin.categories', ['categories' => $categories]);
    }

    public function postCreateCategory(Request $request) {
        $this->validate($request, ['name' => 'required|max:50']);
        $cat = new Category();
        $cat->name = $request['name'];
        if ($cat->save()) {
            return Response::json(['message' => 'Category Created'], 200);
        }
        return Response::json(['message' => 'somthing wrong'], 404);
    }
    public function postDeleteCategory(Request $request) {
        $cat =Category::find($request['category_id']);
        if ($cat->delete()) {
            return Response::json(['success' => 'Category Deleted'], 200);
        }
        return Response::json(['fail' => 'somthing wrong'], 404);
    }

    public function postUpdateCategory(Request $request) {
        $category = Category::where('id',$request['category_id'])->first();
        if (!$category) {
            return Response::json(['fail' => 'Category is not founded'], 404);
        }
        $this->validate($request, ['name' => 'required|max:50']);
        $category->name = $request['name'];
        if ($category->update()) {
            return Response::json(['success' => 'updated'], 200);
        }
        return Response::json(['fail' => 'somthing wrong'], 404);
    }
    
//    public function postTest(Request $request) {
//        $test=$request['test'];
//        return Response::json(['test'=>$test],200);
//    }
//    public function getTest() {
//        return Response::json(['test'=>"i wa"],200);
//    }

}
