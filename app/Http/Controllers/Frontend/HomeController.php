<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;



class HomeController extends Controller
{
    public function index(){
        $sliderModel = new Slider();
        $productModel = new Product();
        $brandModel = new Brand();
        $categoryModel = new Category();
        $sliderItems = $sliderModel->getListItems(null,['task' =>'frontend_get_list_items']);
        $productFeatured = $productModel->getListItems(null,['task' =>'frontend_get_featured_items']);
        $latestProducts = $productModel->getListItems(null,['task' =>'frontend_get_latest_items']);
        $promoProducts = $productModel->getListItems(null,['task' =>'frontend_get_promo_items']);
        $brandFeatured = $brandModel->getListItems(null,['task' =>'frontend_get_featured_brand']);
        $price_shock = $productModel->getListItems(null,['task' =>'frontend_get_price_shock_item']);
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        // dd($categoryItems);
        // dd($sliderItems);
        return view('frontend.pages.home.index',compact('sliderItems','productFeatured','latestProducts',
                    'promoProducts','brandFeatured','price_shock','categoryItems'));
    }
}
