<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;

class OrderController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);

        return view('frontend.pages.order.index', compact('categoryItems'));
    }
    
}
