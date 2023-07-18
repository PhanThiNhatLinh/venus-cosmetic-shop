<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function showDetail(Request $request){
        if($request->input('price_field')){
            $params['price_field'] = $request->input('price_field');
        }else{
            $params['price_field'] = 'all';
        }
        $params['id'] = $request->category_id;
        // dd($params);
        $categoryModel = new Category();
        $productModel = new Product();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $categoryItem = $categoryModel->getItem($params,['task' =>'admin_get_item']);
        $items = $categoryModel->getProductsInCategory($params,['task' =>'frontend_get_lists_products']);
        // dd($productsInCategory);
        return view('frontend.pages.category.category_detail', compact('categoryItem','categoryItems','items','params'));
    }
    
}
