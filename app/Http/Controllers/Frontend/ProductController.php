<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function showDetail(Request $request){
        $id = $request->product_id;
        $categoryModel = new Category();
        $productModel = new Product();
        $product = $productModel->getItem($id,['task'=>'admin_get_item']);
        $latestProducts = $productModel->getListItems(null,['task' =>'frontend_get_latest_items']);
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        return view('frontend.pages.product.product_detail', compact('categoryItems','product','latestProducts'));
    }
    
    public function search(Request $request){
        $productModel = new Product();
        $categoryModel = new Category();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $params['search_data'] = $request->search_data;
        $products = $productModel->searchItem($params,['task'=>'frontend_search_item']);
        // dd($items);
        // die();
        return view('frontend.pages.product.search', compact('products','categoryItems'));
    }


}
