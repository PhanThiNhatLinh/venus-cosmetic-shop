<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showListBrand(){
        $categoryModel = new Category();
        $brandModel = new Brand();
        $items = $brandModel->getListItems(null,['task'=>'frontend_get_lists_brand']);
        // dd($items);
        // die();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        return view('frontend.pages.brand.list', compact('categoryItems','items'));
    }

    public function showBrandDetail(Request $request){
        if($request->input('price_field')){
            $params['price_field'] = $request->input('price_field');
        }else{
            $params['price_field'] = 'all';
        }
        $id = $request->brand_id;
        $params['id']= $id;
        $categoryModel = new Category();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $brandModel = new Brand();
        $item = $brandModel->getItem($id,['task'=>'admin_get_item']);
        // dd($item);
        $items = $brandModel->getProductsInBrand($params,['task' =>'frontend_get_lists_products']);
        return view('frontend.pages.brand.detail', compact('categoryItems','item','items','params'));
    }
}
