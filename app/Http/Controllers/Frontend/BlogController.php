<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $blogModel = new Blog();
        $items = $blogModel->getListItems(null,['task'=>'frontend_get_list_items']);
        // dd($blogs);
        // die();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        return view('frontend.pages.blog.list', compact('categoryItems','items'));
    }

    public function showBlogDetail(Request $request){
        $id_blog = $request->blog_id;
        $categoryModel = new Category();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $blogModel = new Blog();
        $item = $blogModel->getItem($id_blog,['task'=>'admin_get_item']);
        return view('frontend.pages.blog.detail', compact('categoryItems','item'));
    }
}
