<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function showDetail(string $id){
        $categoryModel = new Category();
        $productModel = new Product();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $categoryItem = $categoryModel->getItem($id,['task' =>'admin_get_item']);
        $productsInCategory = $categoryModel->getProductsInCategory($id,['task' =>'frontend_get_lists_products']);
        // dd($productsInCategory);
        return view('frontend.pages.category.category_detail', compact('categoryItem','categoryItems','productsInCategory'));
    }
    
}
