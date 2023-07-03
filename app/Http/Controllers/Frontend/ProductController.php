<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function showDetail(string $id){
        $categoryModel = new Category();
        $productModel = new Product();
        $product = $productModel->getItem($id,['task'=>'admin_get_item']);
        $latestProducts = $productModel->getListItems(null,['task' =>'frontend_get_latest_items']);
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        return view('frontend.pages.product.product_detail', compact('categoryItems','product','latestProducts'));
    }
    
}
